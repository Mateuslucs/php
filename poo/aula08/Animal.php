<?php

abstract class Animal{
    protected $weight;
    protected $year;
    protected $limbs;

    abstract function move();

    abstract function feed();

    abstract function makeSound();
}