class Utils {

    constructor(){

            this.click = document.querySelector('#check');
            this.check = document.querySelector('.check');

            this.Check();
              
    }

     Check(){
        this.click.addEventListener('click', e =>{
            this.click.style.display = "none";
            this.check.style.display = "block";
          });
    }

}