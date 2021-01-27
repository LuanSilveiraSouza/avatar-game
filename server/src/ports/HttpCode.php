<?php

namespace App\Ports;

abstract class HttpCode
{
    const Http200 = 'HTTP/1.1 200 OK';
    const Http201 = 'HTTP/1.1 201 CREATED';
    const Http400 = 'HTTP/1.1 400 BAD REQUEST';
    const Http404 = 'HTTP/1.1 404 NOT FOUND';
    const Http500 = 'HTTP/1.1 500 INTERNAL SERVER ERROR';
}
