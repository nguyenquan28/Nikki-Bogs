<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class report
{
    public $report_id;
    public $content;
    public $user_id;
    public $time;
    public $post_id;
    public $status;

    function __construct($report_id, $content, $user_id, $time, $post_id, $status)
    {
        $this->report_id = $report_id;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->time = $time;
        $this->post_id = $post_id;
        $this->status = $status;
    }
}

class reportModel
{
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    // Function paginasion
    function paginasion($no_of_records_per_page)
    {
        $total_pages_sql = "SELECT COUNT(*) FROM report";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {

        $query = "SELECT * FROM report ORDER BY status DESC, time DESC LIMIT $offset, $no_of_records_per_page";
        $data = $this->db->select($query)->fetch_all(1);

        return $data;
    }

    // Insert record in table report 
    function insert(report $report)
    {
        $query = "INSERT INTO report (report_id, content, user_id, time, post_id, status) 
        VALUE ('$report->report_id', '$report->content', '$report->user_id', '$report->time', '$report->post_id', '$report->status')";
        $this->db->insert($query);
    }

    function changeStt($id, $status)
    {
        $query = "UPDATE report SET status = $status WHERE report_id = $id";
        $result = $this->db->update($query);
    }

    // get delete record in table post
    function delete($report_id)
    {
        $query = "DELETE FROM report WHERE report_id = '$report_id'";
        $result = $this->db->delete($query);
    }

    // Search by ID
    function searchByID($report_id)
    {
        $query = "SELECT * FROM report WHERE report_id = '$report_id'";
        $result = $this->db->select($query);
        return $result;
    }

    //  Search all $report_id, $content, $user_id, $time, $post_id, $status
    function search($tags)
    {
        
        $result = [];
        $query = "SELECT * FROM report, user, posts 
                    WHERE report.report_id REGEXP '" . $tags . "' 
                    OR user.name REGEXP '" . $tags . "'
                    OR report.content REGEXP '" . $tags . "' 
                    OR report.time REGEXP '" . $tags . "' 
                    OR report.status REGEXP '" . $tags . "' 
                    OR posts.title REGEXP '" . $tags . "'
                    GROUP BY report.report_id
                ";
        $data = $this->db->select($query);
        // echo '<pre>';
        // print_r($data->fetch_all());
        // echo '</pre>';
        if (empty($data)) {
            return '';
        } else {
            foreach ($data->fetch_all() as $value) {
                array_push($result, new post($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11]));
            }
            return $result;
        }
    }

    // Count status
    function countStt()
    {
        $query = "SELECT COUNT(*) FROM report WHERE status = '1'";
        $result = $this->db->select($query);

        return $result;
    }
}
