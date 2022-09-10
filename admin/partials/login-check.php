<?php

if (!isset($_COOKIE['user'])) {
  header("location:" . LOGIN_PAGE_URL);
}