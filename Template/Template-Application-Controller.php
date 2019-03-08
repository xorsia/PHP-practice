<?php
// Шаблон Application Controller
class Controller {
    // Сюда будет записываться одноим. об. кл.
    private $applicationHelper;
    public static $instance;
    // Закрытый конструктор, чтобы нельзя было создать альтернативный контроллер
    private function __construct() {}

    // Запуск класса, создание об. кл.
    static function run() {
        self::$instance = new Controller();
        // Выполняется при запуске приложения;
        self::$instance->init();
        // Вып. при каждом запросе пользователя;
        self::$instance->handleRequest();
    }

    // При запуске приложения, проверка файла конфигурации, также получение данных с кл. ApplicationRegistry;
    // Данные будут считываться только первый раз при запуске, а при всех остальных запросах они будут храниться в ControllerMap
    // Об. кл. ApplicationRegistry счит. конфиг. и запишет ее в хранилище ControllerMap, если там еще ничего нет;
    function init() {
        // ApplicationRegistry - регистр\класс\хранилище\ассоциативный массив для об. классов: ControllerMap, Request, appController,
        // также он отвечает за хранение (сохранение и извление данных конфигурации файла).

        // ApplicationHelper - будет проводить операции сравнения, вызывая методы ApplicationRegistry, например:
        // указывать какой об. кл. создать, что считать, что записать;

        // Если в кеш-памяти ControllerMap - ничего нет, то счит. данные конфиг. с файла и записываются в ControllerMap,
        $this->applicationHelper = ApplicationHelper::instance();
        // Этот метод выполнится один раз, при запуске, при пустых св. об. кл. ControllerMap,
        // в противном случаи, проверка файла и его считывание, с использованием ApplicationRegistry не будут проводится,
        // так как данные уже записаны в ControllerMap;
        $this->applicationHelper->init();
    }

    // При каждом запросе пользователя
    function handleRequest() {

        // Создать и получить об. кл. Request, хранилище;
        $request = ApplicationRegistry::getRequest();

        // Созд. об. кл. appController;
        $app_r = ApplicationRegistry::appController();

        // Передать ссылку на кл., передается тип кл. Request
        // Будет извлечена ссылка на об. кл., который хранился в, по сути, ассоц. массиве Request;
        // Будет проверено есть ли такой файл/класс физически;
        // Возвращаемый тип или null (если состояние для класса - выполнил) или об. кл Command (если состояние - выполняется);
        // Тоесть один класс будет порождать вызов другого класса;
        while ($cmd = $app_r->getCommand($request)) {
            // Будет выполнен метод полученного об. кл., а в него будет передано хранилище;
            $cmd->execute($request);
        }
        // Получаем данные с хранилища $request, метод вернет имя нужного файла для преставления
        $this->invokeView($app_r->getView($request));
    }

    // Метод поключения нужного файла представления;
    function invokeView($target) {
        include("$target.php");
        exit;
    }
}