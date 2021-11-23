new Vue({
  el: '#app',
  data: {
    errors:[],
    email: '',
    termsState: false,
    validated: false,
  },

  computed: {
    termsError() {
      return this.validated && !this.termsState

    }
    
  },
  methods:{
    
    checkForm:function(e) {
      this.errors = [];
      if(!this.email) {
        this.errors.push("Email required.");
      } else if(!this.validEmail(this.email)) {
        this.errors.push("Valid email required.");  
      } else if(this.countryEmail(this.email)){
        this.errors.push("We are not accepting subscriptions from Colombia emails.");
      }
      
      if(!this.errors.length && !this.termsState === false) 
      return;
      e.preventDefault();
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
    },
    countryEmail:function(email) {
      var we =/\.(cu|)$/i;
    return we.test(email);   
    },
    handleTermsState() {
      this.validated = false;
    }, 
    handleSubmit() {
      this.validated = true
    }
  }
});



