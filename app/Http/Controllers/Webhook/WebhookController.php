<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Webhook\WebhookInterface;

class WebhookController extends Controller
{
    public function __construct(WebhookInterface $webhookInterface)
    {
        $this->webhookInterface = $webhookInterface;
    }

    public function index(Request $request)
    {
        return $this->webhookInterface->index($request);
    }
}
