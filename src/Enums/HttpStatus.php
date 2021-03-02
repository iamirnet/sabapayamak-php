<?php

namespace Sabapayamak\Enums;

abstract class HttpStatus extends General {
    const  Ok  = "200";
    const  NoContent = "204";
    const  BadRequest = "400";
    const  NotFound = "404";
    const  UnAuthorized = "401";
    const  Forbidden = "403";
    const  InternalServerError = "500";
}

?>