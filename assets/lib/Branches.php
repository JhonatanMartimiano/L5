<?php

class Branches
{

    private $branchFile;
    private $queueFile;
    private $status_branches = array();
    private $users = array();
    private $info_branches = array();

    public function __construct()
    {
        $this->branchFile = file('ramais');
        $this->queueFile = file('filas');
        $this->readStatusBranches();
        $this->readInfoBranches();
    }

    private function readStatusBranches()
    {
        $queues = $this->queueFile;
        foreach ($queues as $rows) {
            if (strstr($rows, 'SIP/')) {
                if (strstr($rows, '(Ring)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch) = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'calling');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
                if (strstr($rows, '(In use)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch) = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'occupied');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
                if (strstr($rows, '(paused)') && strstr($rows, '(Not in use)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch)  = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'paused');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
                if (strstr($rows, '(paused)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch)  = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'paused');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
                if (strstr($rows, '(Not in use)') && !strstr($rows, '(paused)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch)  = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'available');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
                if (strstr($rows, '(Unavailable)')) {
                    $row = explode(' ', trim($rows));
                    list($tech, $branch)  = explode('/', $row[0]);
                    $this->status_branches[$branch] = array('status' => 'offline');
                    $this->users[$branch] = array('users' => explode("\n", explode(" ", $rows)[count(explode(" ", $rows)) - 1])[0]);
                }
            }
        }
    }

    private function readInfoBranches()
    {
        $branches = $this->branchFile;
        foreach ($branches as $rows) {
            $row = array_filter(explode(' ', $rows));
            $arr = array_values($row);
            if (trim($arr[1]) == '(Unspecified)' && trim($arr[4]) == 'UNKNOWN') {
                list($name, $username) = explode('/', $arr[0]);
                list($host) = explode(' ', $arr[1]);
                $this->info_branches[$name] = array(
                    'name' => $name,
                    'branch' => $username,
                    'host' => $host,
                    'online' => false,
                    'status' => $this->status_branches[$name]['status'],
                    'user' => $this->users[$name]['users']
                );
            }
            if (trim($arr[5]) == "OK") {
                list($name, $username) = explode('/', $arr[0]);
                list($host) = explode(' ', $arr[1]);
                $this->info_branches[$name] = array(
                    'name' => $name,
                    'branch' => $username,
                    'host' => $host,
                    'online' => true,
                    'status' => $this->status_branches[$name]['status'],
                    'user' => $this->users[$name]['users']
                );
            }
        }
    }

    public function getJson()
    {
        return json_encode($this->info_branches);
    }
}
