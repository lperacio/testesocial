<template>
    <form @submit.prevent="submit" enctype="multipart/form-data" >
    <p class="text-danger">Campos com  * são obrigatórios.</p>
        <div class="form-group">
            <label for="name">Nome <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
	
        <div class="form-group">
            <label for="email">E-mail<span class="text-danger">*</span> </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="mail@exemplo.com" v-model="fields.email" />
            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
        </div>
        <div class="form-group">
            <label for="phone">Telefone <span class="text-danger">* </span> </label>
            <input type="telefone" class="form-control" name="phone" id="phone" placeholder="(XX)XXXXX-XXXX"  v-model="fields.phone" />

            <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
        </div>
        <div class="form-group">
            <label for="file">Anexar arquivo <span class="text-danger">*</span> </label>
            <input type="file" class="form-control" ref="fileupload" name="file" id="file" v-on:change="onFileChange"/>
            <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
        </div>
        
        <div class="form-group">
            <label for="message">Mensagem <span class="text-danger">*</span> </label>
            <textarea class="form-control" id="message" name="message" rows="5" v-model="fields.message"></textarea>
            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

        <div v-if="success" class="alert alert-success mt-3">
            Mensagem enviada!
        </div>
    </form>
</template>

<script>
 
export default {
  data() {
    return {
      fields: {},
      file: null,
      errors: {},
      success: false,
      loaded: true,
    }
  },
  methods: {
    onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
                
            },
    submit() {  
      
      if (this.loaded) {
        
        this.loaded = false;
        this.success = false;
        this.errors = {};
        const data = new FormData();
        data.append('file', this.file);
        data.append('name', this.fields['name']);
        data.append('email',this.fields['email']);
        data.append('message', this.fields['message']);
        data.append('phone', this.fields['phone']);
        axios.post('/submit', data ).then(response => {
          this.fields = {}; //Clear input fields.  
          document.getElementById("file").value=null;  
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
}
</script>