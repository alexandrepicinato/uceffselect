<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Miau </title>
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="../screen.css" />

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
                                                    <img src="https://erp-m1r3l1.server.alexandrepicinato.com/contents/?token=CuAbIP5cYEzsHwOkoMpVLP79y6WbgT93IUpObVr9PUVLa2YcJY5BpDxVxZJR&conteudo=Logo&filename=alehotepp&type=png&usertype=0&key=Ujnj0eQaBulXDxUFetbAAwYrUzW2NUhbmRM1CRn1WUDI9GGtH34wY4xv7VR1&request=5DiItuyOLT1qegw5NvendjKbN4fzQzgVhIk5sJyArUxGHMwCDHVgF2lc7DwPrcTv4tKwQg0vZLKU4lKDl9t9h6eEMKY54pnNgbmzk1Uzf3nXwFKyLy5HITkbjzG9zuoVtJzG4xbJor0271L7P9O8IU1YMi6DeiFX38keCVWgh287WodU17K2iiqZU2eiqtPbSlsLeZQBihAZbSt8aKAEzuGXPEpDTl7oreqPR7XXyow9Ua4Woxb8OppPNkA&download=1"/>
                                                    <h1>AleHot EPP Projetos Login</h1>
                                                    <h4>Crie Seu Cadastro  </h4>
                                                </div>
                                                <form method="POST" enctype='multipart/form-data' action ="../cadastro">
                                                    @csrf
                                                    <label>
                                                        <p>Foto De Perfil</p>
                                                        <input type="file" name="filename" required/>
                                                    </label>
                                                    <label>
                                                        <p>Nome</p>
                                                        <input name = "nome" autocomplete="off" />
                                                    </label>
                                                    <label>
                                                        <p>EMail</p>
                                                        <input name = "mail" autocomplete="off" />
                                                    </label>
                                                    <label>
                                                        <p>Data de Aniversario</p>
                                                        <input type="date" name = "date" autocomplete="off" />
                                                    </label>
                                                    <label>
                                                        <p>Senha </p>
                                                        <input type="password" name = "pass" autocomplete="off" />
                                                    </label>
                                                    <label>
                                                    <p>Tipo Usuario </p>
                                                        <select name="usertype">
                                                            <option value="1">Administrador</option>
                                                            <option value="9">Estudante Comum </option>

                                                        </select>
                                                    </label>
                                                    <button class="bt btgreen" type="submit">Criar Cadastro </button>
                                                </form>
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