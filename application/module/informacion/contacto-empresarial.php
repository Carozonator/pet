<?php

$title = "CONTACTO EMPRESARIAL";
$text1 = htmlentities("Puedes contactar con nosotros para hacernos llegar tus propuestas o consultas");




?>


<style>
    input,textarea{
        margin:5px;
        width:300px;
    }
    td{
        font-weight:bold;
    }
</style>


<div class="informacion">
    <h3><?php echo $title; ?></h3>
    <p><?php echo $text1; ?></p>
    <p><?php echo $text2; ?></p>
    <form method="POST" action="/informacion/sugerenciaPost/">
        <table>
            <tr>
                <td>Tu nombre</td>
                <td>
                    <input name="name" required type="text" value=""/>
                </td>
            </tr>
            <tr>
                <td>Nombre de la empresa</td>
                <td>
                    <input name="empresa" required type="text" value=""/>
                </td>
            </tr>
            <tr>
                <td>Tu email</td>
                <td>
                    <input name="email" required type="text" value=""/>
                </td>
            </tr>
            <tr>
                <td>Texto de la consulta</td>
                <td>
                    <textarea required name="message"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button style="margin-left:5px;" class="button">Enviar</button>
                </td>
            </tr>
        </table>
    </form>
</div>