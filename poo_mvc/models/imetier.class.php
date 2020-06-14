<?php
// principe SOLID 
//Interface => classe 100% abstraite 
//Interface => on specifie ce qu'on veut et non pas comment le faire (impelementation)
namespace App;

interface Imetier
{

    public static  function connect();
    public static  function store(array $data);
    public  static  function update($data, ?int $id = 0);
    public static  function  all(): array;
    public static  function find(int $id);
    public static  function findBy(string $condition, array $data);
    public static  function delete($id);
}
