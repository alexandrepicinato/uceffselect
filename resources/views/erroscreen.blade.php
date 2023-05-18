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
        .corpo{
            background-image: url('https://erp-m1r3l1.server.alexandrepicinato.com/contents/?token=CuAbIP5cYEzsHwOkoMpVLP79y6WbgT93IUpObVr9PUVLa2YcJY5BpDxVxZJR&conteudo=DesenhosAleHot&filename=64&type=png&usertype=0&key=Ujnj0eQaBulXDxUFetbAAwYrUzW2NUhbmRM1CRn1WUDI9GGtH34wY4xv7VR1&request=5DiItuyOLT1qegw5NvendjKbN4fzQzgVhIk5sJyArUxGHMwCDHVgF2lc7DwPrcTv4tKwQg0vZLKU4lKDl9t9h6eEMKY54pnNgbmzk1Uzf3nXwFKyLy5HITkbjzG9zuoVtJzG4xbJor0271L7P9O8IU1YMi6DeiFX38keCVWgh287WodU17K2iiqZU2eiqtPbSlsLeZQBihAZbSt8aKAEzuGXPEpDTl7oreqPR7XXyow9Ua4Woxb8OppPNkA&download=1') ;
            background-size: cover;
            width: 100%;
            height: 100vh;
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
            height: 100%;
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
                                            <div class="formulario">
                                                <div>
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnXr2WQZ7C_uKNIDEe5wgyDjEJk5k1gkKfow&usqp=CAU"/>
                                                    <h1>ERROR </h1>
                                                    <h3>{{$errorcode}}</h3>
                                                    <h4>{{$description}}</h4>
                                                </div>
                                            </div>
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
</html>