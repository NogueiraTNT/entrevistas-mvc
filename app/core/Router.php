<?php
namespace Core;

class Router
{
    public function run()
    {
        //1- Verificar se tem url
        $url = $_GET['url'] ?? 'entrevistas/index';

        //2- Quebra url em partes
        $urlParts = explode('/', $url);

        //3- Pega o controller (Primeira parte)
        $controllerName = ucfirst($urlParts[0]) . 'Controller';

        // 4- Define o metodo (segunda parte)
        $method = $urlParts[1] ?? 'index';

        //5- define o parametros  (demais partes)
        $params = array_slice($urlParts, 2);

        //6- Montar namespace completo da classe
        $controllerClass = 'App\\Controllers\\' . $controllerName;

        //7- Verifica se a classe existe 
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            //8- Virifica se o metodo existe
            if (method_exists($controller, $method)) {
                //9- Chama o metodo com os parametros  (Se houver)
                call_user_func_array([$controller, $method], $params);
            } else {
                echo "Metodo <strong>$method</strong> não encontrado no controller <strong>$controllerName</strong>.";
            }
            
        } else {
            echo "Controller <strong>$controllerName</strong> não encontrado.";
        }
        
    }
}
