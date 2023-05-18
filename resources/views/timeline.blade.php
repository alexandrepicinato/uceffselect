<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Miau </title>
    <style>
        *{
            margin: 0;
            border: 0;
            padding: 0;
        }
        .container{
            margin-top: 30%;
            filter: drop-shadow(5px 5px 8px green);
            position:relative;
            padding: 10px;
            background-color: #f7f7f7;
            text-align: center;
            max-width: 500px;
            width: 100%;
            margin: auto;
            border-radius: 25px;
            color: #3b5998;
            border: 1px solid f6f6f6;
        }
        .boxform{
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            margin-top: 20%;
        }
        .scrolling{
            height: 70vh;
            overflow-y: scroll;
        }
        .formulario{
            width: 100%;
        }
        .formulario:nth-child(1){
            width: 100%;
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .usernameinput{
            margin: auto;
            background: url(https://cdn4.iconfinder.com/data/icons/thin-line-icons-for-seo-and-development-1/64/seo_emailer-64.png) 0px 5px / 24px no-repeat transparent;
            width: 90%;
            float: left;
            border-top: transparent;
            border-right: transparent;
            border-left: transparent;
            border-image: initial;
            border-bottom: 1px solid rgb(204, 204, 204);
            padding: 10px 10px 10px 30px;
            color: rgb(24, 25, 26);
            overflow-wrap: break-word;
            outline: none;
            display: flex;
            flex: 1 1 100%;
            -webkit-tap-highlight-color: transparent;
            font-size: 16px;
        }
        .formulario > div{
            width: 100%;
        }
        .formulario >div> img{
            width: 50%;
            height: 50%;
            aspect-ratio: 16/9;
        }
        .formulario:nth-child(2){
            width: 100%;
        }
        .formulario:nth-child(2)>label:nth-child(2)>input{
            margin: auto;
            background: url(https://cdn2.iconfinder.com/data/icons/thin-line-icons-for-seo-and-development-1/64/SEO_key-64.png) 0px 5px / 24px no-repeat transparent;
            width: 90%;
            float: left;
            border-top: transparent;
            border-right: transparent;
            border-left: transparent;
            border-image: initial;
            border-bottom: 1px solid rgb(204, 204, 204);
            padding: 10px 10px 10px 30px;
            color: rgb(24, 25, 26);
            overflow-wrap: break-word;
            outline: none;
            display: flex;
            flex: 1 1 100%;
            -webkit-tap-highlight-color: transparent;
            font-size: 16px;
        }
        .bt{
            border: 1px solid #25692A;
            border-radius: 4px;
            display: inline-block;
            cursor: pointer;
            font-family: Verdana;
            font-weight: bold;
            font-size: 13px;
            padding: 6px 10px;
            text-decoration: none;
        }
        .bt:active {
            position: relative;
            top: 2px;
        }
        .btred{
            border-color: #f59f78;
            background: linear-gradient(to bottom, #ee1818 5%, #fc6f12 100%);
            box-shadow: inset 0px 1px 0px 0px #d7ecfd;
            color: #fff;
            text-shadow: 0px 1px 0px #528009;
        }
        .btred:hover {
            background: linear-gradient(to bottom, #f3a96c 5%, #e23737 100%);
        }
        .btgreen{
            border-color: #adfd9c;
            background: linear-gradient(to bottom, #00f566 5%, #00fa00 100%);
            box-shadow: inset 0px 1px 0px 0px #d7ecfd;
            color: #fff;
            text-shadow: 0px 1px 0px #528009;
        }
        .btgreen:hover {
            background: linear-gradient(to bottom, #38d424 5%, #18be2e 100%);
        }
        .timelineitem{
            width:100%; display:flex; height:10%;flex-direction: row;
        }
        .timelineitem > div>img{
            width:100%;border-radius:50%;aspect-ratio:1/1;
        }
        .timelineitem > div{
            display: flex;flex-direction: row;align-content: flex-start;justify-content: center;align-items: center;
			width:100%;
        }
		.timelineitem > div >div {
			width: 100%;
		}
		.scrolling{
			width: 100%;
			overflow-y: scroll;
		}
		.scrolling>div{

		}
    </style>
</head>
<body>
    <section>
        <div class="corpo">
            <div class="container">
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div class="boxform">
                                        <div>
											<h1>
												Alunos Cadastrados+
											</h1>
											<input class="js-search_input" name = "searsh" autocomplete="off" />
                                            <div>
												<div class="scrolling">
													<div>
														<ol id="elementsList">
															@foreach ($birghtday as $item)
															<li class="data-itens timelineitem js-search_list" id="elements">
															<div>
                                                                <img src="{{$item -> picture}}" />
                                                            </div>
                                                            <div>
                                                                <div><h4>{{$item -> nomeestudante}}</h4></div>
                                                                <div><p>{{$item -> bornat}}</p></div>
                                                                <div>
                                                                <a href="./admin/update/{{$item -> id}}" class="bt btgreen">Atualizar Aluno</a>
                                                                <a href="./admin/delete/{{$item -> id}}" class="bt btred">Deletar Aluno</a>
                                                                </div>
                                                            </div>

															</li>
															@endforeach
														</ol>
													</div>
												</div>
											</div>
                                        </div>
										<div>
											<a href="./login/form/" class="bt btgreen">Login</a>
											<a href="./login/newStudent/" class="bt btred">Cadastrar Usuario</a>
										</div>
                                    </div>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
function quickFilter(srchInput, srchSel) {
  
  $(srchInput).on('change keyup paste mouseup', function() {
    var s = $(this).val();
    filter(s);
  });
  
  function filter(s) {
    $(srchSel).each(function() {
      var txt = $(this).text();
      if (txt.toLowerCase().indexOf(s.toLowerCase()) < 0) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  };
  
};

quickFilter('.js-search_input', '.js-search_list li');
</script>

</html>