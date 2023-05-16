<?php
class CustomException
{
  public $msg;
  public $code;
  function __construct($msg, $code)
  {
    $this->msg = $msg;
    $this->code = $code;
  }

  static function notLoggedIn()
  {
    http_response_code(401);
    return new self("Not logged in", 401);
  }

  static function invalidUsername()
  {
    http_response_code(401);
    return new self("Invalid username", 401);
  }

  static function invalidAccess()
  {
    http_response_code(401);
    return new self("Invalid access", 401);
  }

  static function invalidPassword()
  {
    http_response_code(401);
    return new self("Invalid password", 401);
  }

  static function invalidAcademicSemester()
  {
    http_response_code(401);
    return new self("Invalid academic semester", 401);
  }

  static function notAllowed()
  {
    http_response_code(403);
    return new self("Forbidden you don't have access", 403);
  }

  static function notFound()
  {
    http_response_code(404);
    return new self("Requested information not found", 404);
  }
  static function internalConnectionError()
  {
    http_response_code(500);
    return new self("Internal server connection error", 500);
  }
  static function tableNotFound()
  {
    http_response_code(500);
    return new self("Table not found error", 500);
  }
  static function dataAlreadyIn()
  {
    http_response_code(406);
    return new self("Posted data is already in the server", 406);
  }

  static function conflictToServer()
  {
    http_response_code(409);
    return new self("This will make a conflict to server", 409);
  }
}