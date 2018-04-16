const home = new Vue({
    el: '#short-url',
    data: {
        longUrl: '',
        apiKey: apiKey,
        shortUrl:'',
        submit:false,
        loading:false,
    },
    methods:{
        make:function(){
            var self=this;
            this.submit=true;
            if(!this.longUrl){
                return ;
            }
            this.loading=true;
            axios.post(apiUrl,{apiKey:this.apiKey,longUrl:this.longUrl}).then(function(data){
                self.shortUrl=data.data.id;
                self.reset();
            }).catch(function(e){
                self.error=e;
            });
        },
        reset:function(){
            this.submit=false;
            this.loading=false;
        }
    }
});
