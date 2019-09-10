   /* FUNCIONES DE LIKES */
   function loadPHP_like_post(post_id, action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               // myFunction(this);
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   function no_like(post_id, user_id) {
       var no_like_btn = '#no_like_' + post_id;
       var no_like_account = '#no_like_' + post_id + '_account';
       var like_btn = '#like_' + post_id;
       var like_account = '#like_' + post_id + '_account';
       var action_query;

       if ($(no_like_btn).css("color") == "rgb(33, 37, 41)") {
           $(no_like_btn).css("color", "rgb(200, 35, 51)");
           $(no_like_account).html(parseInt($(no_like_account).html()) + 1);
           action_query = "./like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=no_like";
       } else {
           $(no_like_btn).css("color", "rgb(33, 37, 41)");
           $(no_like_account).html(parseInt($(no_like_account).html()) - 1);
           action_query = "./like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=NULL";
       }
       if ($(like_btn).css("color") == "rgb(0, 105, 217)") {
           $(like_btn).css("color", "rgb(33, 37, 41)");
           if (parseInt($(like_account).html()) > 0) {
               $(like_account).html(parseInt($(like_account).html()) - 1);
           }
       }
       loadPHP_like_post(post_id, action_query);
   }

   function like(post_id, user_id) {
       var no_like_btn = '#no_like_' + post_id;
       var no_like_account = '#no_like_' + post_id + '_account';
       var like_btn = '#like_' + post_id;
       var like_account = '#like_' + post_id + '_account';
       var action_query;

       if ($(like_btn).css("color") == "rgb(33, 37, 41)") {
           $(like_btn).css("color", "rgb(0, 105, 217)");
           $(like_account).html(parseInt($(like_account).html()) + 1);
           action_query = "./like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=like";
       } else {
           $(like_btn).css("color", "rgb(33, 37, 41)");
           $(like_account).html(parseInt($(like_account).html()) - 1);
           action_query = "./like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=NULL";
       }
       if ($(no_like_btn).css("color") == "rgb(200, 35, 51)") {
           $(no_like_btn).css("color", "rgb(33, 37, 41)");
           if (parseInt($(no_like_account).html()) > 0) {
               $(no_like_account).html(parseInt($(no_like_account).html()) - 1);
           }
       }
       loadPHP_like_post(post_id, action_query);
   };

   /* FUNCION DE ELIMINAR POST*/
   function loadPHP_delete_post(post_id, action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               // myFunction(this);
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   function delete_post(post_id) {
       var box_post = '#bp_' + post_id;
       var action_query;
       action_query = "./delete_post.php?post_id=" + post_id;
       loadPHP_delete_post(post_id, action_query);
       $(box_post).fadeOut();
   }
   delete_post("post_245bbcb105a75811539092741");


   // ELIMINAR AMIGOS

   function loadPHP_remove_friend(friends_relation_id, action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               // myFunction(this);
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   function delete_friend(friends_relation_id) {
       var box_friend = '#bf_' + friends_relation_id;
       var sidebar_box_friend = '#sbf_' + friends_relation_id;
       action_query = "./remove_from_friends.php?friends_relation_id=" + friends_relation_id;
       /*
       console.log("El amigo es: " + friends_relation_id);
       console.log("El box_friend es: " + box_friend);
       console.log("El sidebar_box_friend es: " + sidebar_box_friend);
       console.log("El action_query es: " + action_query);
       */
       loadPHP_delete_post(friends_relation_id, action_query);
       $(box_friend).fadeOut();
       $(sidebar_box_friend).fadeOut();
       $('#friends_account').html(parseInt($('#friends_account').html()) - 1);
       $('#friendship').html('<span class="badge"><i class="fas fa-user-times"></i></span> Agregar a Amigos</a>');
       $('#friendship').removeClass('btn-danger');
       $('#friendship').addClass('btn-primary');
   }

   // ACEPTAR AMIGOS
   function loadPHP_accept_friend(friends_relation_id, action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {}
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   function accept_friend(friends_relation_id, user_id_a, user_id_b) {
       var box_friend = '#addbf_' + friends_relation_id;
       action_query = "./accept_to_friends.php?friends_relation_id=" + friends_relation_id + "&user_id_a=" + user_id_a + "&user_id_b=" + user_id_b;

       // console.log("El amigo es: " + friends_relation_id);
       // console.log("El box_friend es: " + box_friend);
       // console.log("El action_query es: " + action_query);
       $('#friends_ask_account_num').html(parseInt($('#friends_ask_account_num').html()) - 1);
       if (parseInt($('#friends_ask_account_num').html()) == 0) {
           $('#friends_ask_account').html("No tienes solicitudes de amistad pendientes");
       };

       loadPHP_accept_friend(friends_relation_id, action_query);
       $(box_friend).fadeOut();
       $('#friends_account').html(parseInt($('#friends_account').html()) - 1);
   }

   // AGREGAR AMIGO
   function loadPHP_add_friend(action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               $('#friendship').html('<span class="badge"><i class="fas fa-user-times"></i></span> Cancelar solicitud de amistad</a>');
               $('#friendship').removeClass('btn-primary');
               $('#friendship').addClass('btn-danger');
               $.ajax({
                   url: "./functions.php",
                   type: "POST",
                   data: "replace_suggestion",
                   success: function(resultado) {
                       $("#friends_suggestions").append(resultado);
                   }
               })
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   from = 6;
   to = 5;

   function add_friend(user_id) {

       var box_friend = '#suggests_' + user_id;
       action_query = "./add_to_friends.php?user_id=" + user_id;

       console.log("El amigo es: " + user_id);
       console.log("El box_friend es: " + box_friend);
       console.log("El action_query es: " + action_query);

       loadPHP_add_friend(action_query);
       $(box_friend).fadeOut("slow");
       $('#friends_account').html(parseInt($('#friends_account').html()) - 1);
       $('#friendship').html('<span class="badge"><i class="fas fa-user-times"></i></span> Cancelar solicitud de amistad</a>');
       $('#friendship').removeClass('btn-primary');
       $('#friendship').addClass('btn-danger');
   }
   


   //ELIMINAR CUENTA DE USUARIO
   function loadPHP_delete_user(action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               window.location.replace("./logout.php");
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   function delete_user_account(user_id) {
       action_query = "./welcome.php?delete_user_id=" + user_id;
       console.log("El action_query es: " + action_query);
       loadPHP_delete_user(action_query);
   }

   // --------------- VER MAS PUBLICACIONES
   function see_more_post(action_query) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               $('#friendship').html('<span class="badge"><i class="fas fa-user-times"></i></span> Cancelar solicitud de amistad</a>');
               $('#friendship').removeClass('btn-primary');
               $('#friendship').addClass('btn-danger');
               $.ajax({
                   url: "./functions.php",
                   type: "POST",
                   data: "replace_suggestion",
                   success: function(resultado) {
                       $("#friends_suggestions").append(resultado);
                   }
               })
           }
       }
       xmlhttp.open("GET", action_query, true);
       xmlhttp.send();
   }

   from = 6;
   to = 5;

   function see_more_post() {
       //action_query = "./add_to_friends.php?user_id=" + user_id;

       console.log("Ver más...");
       //console.log("El box_friend es: " + box_friend);
       //console.log("El action_query es: " + action_query);

       /*
       see_more_post(action_query);
       $(box_friend).fadeOut("slow");
       $('#friends_account').html(parseInt($('#friends_account').html()) - 1);
       $('#friendship').html('<span class="badge"><i class="fas fa-user-times"></i></span> Cancelar solicitud de amistad</a>');
       $('#friendship').removeClass('btn-primary');
       $('#friendship').addClass('btn-danger');
       */
   }

   // LEER MAS (POST)
   function read_more(rm_block) {
       var text_id = rm_block;
       var text_dom = "#" + rm_block + " > p";
       //var text_id = "'" + text_id + "'";
       var text = $(text_dom);
       var text_complete = $(text_dom).html();
       var text_complete_length = text_complete.split(/\b[\s,\.\-:;]*/).length;
       var text_limit = 10;
       if (text_complete_length >= text_limit) {
           var text_short = text_complete.split(/\b[\s,\.\-:;]*/, text_limit);
           var read_more_btn = "<span id='read_more_btn" + text_id + "'><b> ... Leer más</b></span>";
           var read_less_btn = "<span id='read_less_btn" + text_id + "'><b> ... Leer menos</b></span>";
           text_short = text_short.join(" ");
           text.html(text_short + read_more_btn);
           $("#read_more_btn" + text_id).on("click", function() {
               text.html(text_complete + read_less_btn);
               $("#read_less_btn" + text_id).on("click", function() {
                   text.html(text_short + read_more_btn);
               });
           });
       }
   }

   
   document.addEventListener('click', e => {
       if (e.target.classList.contains('showmorecomms')) {
           const parent = e.target.parentNode;
           console.log(parent);
       }
   })
   
   /*
   function setSubComm () {
        const getAllComentaries = document.getElementsByClassName("commentelement");
        if (getAllComentaries) {
            Object.values(getAllComentaries).forEach (e => {
                console.log(e);
                const commentaries = '<div class="showmorecomms"  style="cursor:pointer; text-align: right; font-weight: bolder;">Ver sus respuestas.</div>';
                $(e).append(commentaries);
            })            
        }
   }
   */
    var init = 0;
    var limit = 5;
    const request = id => {
        $("#hidemore").show();
        $("#showmore").hide();
        $.ajax({
            url: '/layout/wall_posts_req.php?' + (id && 'perfil=' + id) + ("&init="+ init + "&limit="+ limit),
            type: 'GET',
            dataType: 'html',
            success: response => {
                let publications = document.getElementById('publications');
                //publications.innerHTML = response;
                $("#loadingpubs").hide();
                $("#publications").append(response);
                $("#hidemore").hide();
                $("#showmore").show();
                setSubComm();
            }
        })
        init = init + 5;
        limit = limit + 5;
    } 
    
    $('.wall_posts > p > iframe ').width('100%');
    $('.wall_posts > p > iframe ').height($('.wall_posts > p > iframe ').width());

    function not_empty_post(){
        if($('#post_attachment').val() == "" ){
            $('#new_post_content').prop('required', true)
            // console.log('Esta Requerido');
        } else {
            $('#new_post_content').prop('required', false)
            $('#post_attachment').css("display", "block")
            // console.log('No esta Requerido');;
        }
    }
    not_empty_post();
    $('#new_post').on('change paste keyup', function() {
        not_empty_post();
    });
   
   $(document).ready(e => {
        
       const id = $("#main_container").data('id');
       request(id);
       $("#showmore").on('click', e => request(id))
       document.addEventListener('submit', e => {
           if (e.target.name === 'sendcomment') {
               e.preventDefault();
               const idform = e.target.dataset.idform;
               const collapse = "collapse" + idform;
               const getcollapse = document.querySelector("#"+collapse);
               
               
               
               const submitButton = e.target.querySelector("[type='submit']");
    
               submitButton.disabled = true;
               const comment_post_id = e.target.querySelector("#comment_post_id").value;
               const comment_user_id = e.target.querySelector("#comment_user_id").value;
               const post_owner_user_user_name = e.target.querySelector("#post_owner_user_user_name").value;
               const back_url = e.target.querySelector("#back_url").value;
               const comment = e.target.querySelector("#comment_post_"+comment_post_id).value;
               $.ajax({
                   url: 'comment_post.php',
                   type: 'POST',
                   dataType: 'JSON',
                   data: {
                       comment_post_id,
                       comment_user_id,
                       post_owner_user_user_name,
                       back_url,
                       comment
                   },
                   success: e => {
                       const here = document.getElementById("all_commentaries_in_" + comment_post_id);
                       const element = `
                            <div class="alert alert-primary commentelement" role="alert">
                                <a href="./welcome.php?perfil=${e[1]}">
                                    <h6><img src="${e[3]}" style="height: 18px; border-radius: 50px; margin-right: 7px; ">${e[0] + " " + e[2]}</h6>
                                </a>${comment}
                            </div>
                       `;
                       if (!getcollapse) {
                           $("#all_commentaries_in_" + comment_post_id).prepend(element);
                       }
                       else {
                           const amountComments = document.querySelector("#amount_" + idform);
                           if (amountComments) {
                                const amountCommentsInt = (+amountComments.innerHTML) + 1;
                                amountComments.innerHTML = amountCommentsInt;
                           }
                           $("#"+collapse).prepend(element);
                       }
                       $(".modal-header .close").click();
                       submitButton.disabled = false;
                       
                   }
               })
           }
       })
   })
