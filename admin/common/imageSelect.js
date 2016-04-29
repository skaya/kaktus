    function Filmstrip(){
        this.ePicture = document.getElementById('fsScreen');
		
/*alert(this.ePicture);
       this.ePrev = document.getElementById('fsControl_prev');
       this.eNext = document.getElementById('fsControl_next');
*/		
        var eLinks = document.getElementById('fsLinks');
        this.aeLink = eLinks.getElementsByTagName('a');
        this.show_picture = function( sBackground, iWidth, iHeight ){
//use img here is better -!!!			
          /*  this.ePicture.style.backgroundImage = "url(" + sBackground + ")";
            if( iWidth )
                this.ePicture.style.width = iWidth;
            if( iHeight )
                this.ePicture.style.height = iHeight;*/
				this.ePicture.src = sBackground;
				
            this.set_current( sBackground );
        }
        this.set_current = function( sHref ){
            for( var i = 0 ; i < this.aeLink.length ; i++ ) {
				if ( this.aeLink[i].href == sHref) {
					 this.aeLink[i].style.color = "#FF0000";
				} else {
					this.aeLink[i].style.color = "#000000";
				}				
			} 
					/*                  this.ePrev.className = this.ePrev.className.replace( /\s+disabled/g, "" );
                    this.eNext.className = this.eNext.className.replace( /\s+disabled/g, "" );
                    if( i == 0 ){
                        this.ePrev.className += " disabled";
                        this.ePrev.onclick = function(){};
                        this.eNext.onclick = this.aeLink[i + 1].onclick;
                    }else if( i == this.aeLink.length - 1 ){
                        this.eNext.className += " disabled";
                        this.eNext.onclick = function(){};
                        this.ePrev.onclick = this.aeLink[i - 1].onclick;
                    }else{
                        this.eNext.onclick = this.aeLink[i + 1].onclick;
                        this.ePrev.onclick = this.aeLink[i - 1].onclick;
                    }*/
        }
		
    }

    function Show_picture( sHref, iWidth, iHeight ){
        oFilmstrip.show_picture( sHref, iWidth, iHeight );
        return false;
    }
