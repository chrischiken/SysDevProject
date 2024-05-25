<?php

namespace app\controllers;

use stdClass;


class TicketMessage extends \app\core\Controller
{
    function createMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ticket = new \app\models\TicketMessage();

            $ticket->ticket_id = $_GET['ticket_id'];
            $ticket->user_id = isset($_SESSION['customer_id']) ?
                $_SESSION['customer_id'] : $_SESSION['employee_id'];
            $ticket->message = $_POST['message'];
            $ticket->image_link = $_POST['image_link'];

            $ticket->insert();

            header("Location: /Ticket/index?id=" . $_SESSION["ticket_id"]);
            unset($_SESSION['ticket_id']);
        } else {
            $this->view('Ticket/Message/create');
            include 'app/views/footer.php';
        }
    }

    function viewMessage()
    {
        $ticket = new \app\models\TicketMessage();

        $messages = $ticket->getMessageFromTicketId($_GET['id']);

        include 'app/views/Ticket/Message/index.php';
    }
}