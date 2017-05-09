$(document).ready(function(){
    function readurl(input){
        if (input.files && input.files[0]) {
            var reader= new FileReader();
            reader.onload=function(e){
                $('#prev').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    };
    $('#pic').change(function(){
        readurl(this);
    });
    $('.open').click(function(){
        $('.fullmodal').fadeToggle(200);
    });
    $('.tutup').click(function(){
        $('.fullmodal').fadeToggle(200);
    });
    $('#search').change(function(){
        var keyword=document.getElementById('search').value;
        keyword=keyword.replace(/[?*^()&.',";></%]/gi,"");
        document.getElementById('search').value=keyword;
    });

//register    
    $('#regusr').keyup(function(){
        var warn=$('#w');
        if (this.value.length<=10 && this.value.length>=5 ) {
            warn.addClass('hide');
        }else{
            warn.removeClass('hide');
        };

    });
    $('#regpass').keyup(function(){
        var warn=$('#wr');
        if (this.value.length<8) {
            warn.removeClass('hide');
        }else{
            warn.addClass('hide');
        };
    });
    $('#regrepass').keyup(function(){
         var pass=document.getElementById('regpass');
         var warn=$('#wrp');
         if (this.value!=pass.value) {
            warn.removeClass('hide');
         }else{
            warn.addClass('hide');
         };
    });
    $('#daftar').submit(function(){
        var haverd=document.getElementById('regis');
        var usr=document.getElementById('regusr').value;
        var pass=document.getElementById('regpass').value;
        var repass=document.getElementById('regrepass').value;
        if (haverd.checked!=true) {
            alert('Please confirm that you agree with the term and conditions!');
            return false;
        };
        if (usr.length<5 || usr.length>10) {
            return false;
        };
        if (pass!=repass) {
            return false;
        };
    });

//page lapor
            $('#namapnp').focus(function(){
                $('#aliasname').removeClass('hidden');
            });
            $('#norek').focus(function(){
                $('#noreklain').removeClass('hidden');
            });
            $('#nohp').focus(function(){
                $('#nohplain').removeClass('hidden');
            });
            $('#bukti1').focus(function(){
                $('#buktifoto').removeClass('hidden');
            });
            //regek 
            $('#namapnp').change(function(){
                var nama=document.getElementById('namapnp').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('namapnp').value=nama;
            });
            $('#alias1').change(function(){
                var nama=document.getElementById('alias1').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('alias1').value=nama;
            });
            $('#alias2').change(function(){
                var nama=document.getElementById('alias2').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('alias2').value=nama;
            });
            $('#alias3').change(function(){
                var nama=document.getElementById('alias3').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('alias3').value=nama;
            });

//page update
            $('#nama').change(function(){
                var nama=document.getElementById('nama').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('nama').value=nama;
            });
            $('#pekerjaan').change(function(){
                var nama=document.getElementById('pekerjaan').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('pekerjaan').value=nama;
            }); 
            $('#alamat').change(function(){
                var nama=document.getElementById('alamat').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('alamat').value=nama;
            }); 
             $('#tgl').change(function(){
                var nama=document.getElementById('tgl').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('tgl').value=nama;
            }); 
             $('#sos').change(function(){
                var nama=document.getElementById('sos').value;
                nama=nama.replace(/[?*^()&.',";></%]/gi,"");
                document.getElementById('sos').value=nama;
            });     
});