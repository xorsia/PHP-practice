<?php
// Шаблон Front Controller
class Controller {
    // Сюда будет записываться одноим. об. кл.
    private $applicationHelper;

    // Закрытый конструктор, чтобы нельзя было создать альтернативный контроллер
    private function __construct() {}

    // Запуск класса, создание об. кл.
    static function run() {
        $instance = new Controller();
        // Выполняется при запуске приложения;
        $instance->init();
        // Вып. при каждом запросе пользователя;
        $instance->handleRequest();
    }

    // При запуске приложения, проверка файла конфигурации, также получение данных с кл. ApplicationRegistry;
    function init() {
        $this->applicationHelper = ApplicationHelper::instance();
        $this->applicationHelper->init();
    }

    // При каждом запросе пользователя
    function handleRequest() {

        // Получить с кл. ApplicationRegistry значения св. Request, в нем будет ссылка на об. кл.
        $request = ApplicationRegistry::getRequest();

        // Созд. об. кл. отвечающий за выполнение прог., как в шаблоне Command
        $cmd_r = new CommandResolver();

        // Передать ссылку на кл., передается тип кл. Request
        // Будет извлечена ссылка на об. кл., который хранился в, по сути, ассоц. массиве Request;
        // Будет проверено есть ли такой файл/класс физически;
        // Возвращаемый тип или null или об. кл Command;
        $cmd = $cmd_r->getCommand($request);

        // Будет выполнен метод полученного об. кл.;
        $cmd->execute($request);
    }
}