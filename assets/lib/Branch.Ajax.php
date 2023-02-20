<?php
require "Branches.php";
require "Branch.php";
header("Content-type: application/json; charset=utf-8");
$data = json_decode(file_get_contents("php://input"), true);
if ($data) {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
    $branches = $data["branches"];
    $branchClass = new Branch();
    foreach ($branches as $branch) {
        var_dump($branchClass->save($branch));
    }
    return;
}

$branches = new Branches();
echo $branches->getJson();
