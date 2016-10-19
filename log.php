<?
include('functions.php');
//echo $_GET['task'];
$json = file_get_contents('data.json');
$data = json_decode($json, 1);

if (is_array($data)) {
    krsort($data);
}

switch ($_GET['mode']) {

    case "remove" :
        $id                  = $_GET['id'];
        $data[$id]['status'] = 2;
        save($data);
        break;
    case "stop" :
        $id                    = $_GET['id'];
        $data[$id]['date_end'] = time();
        save($data);
        break;
    case "new" :

        $time                      = time();
        $data[$time]['id']         = $time;
        $data[$time]['name']       = $_GET['name'];
        $data[$time]['date_start'] = $time;
        $data[$time]['date_end']   = '';
        $data[$time]['status']     = 1;
        save($data);
        break;
    case "tally" :

        $count = 0;
        if (is_array($data)) {
            foreach ($data as $task) {
                if ($task['status'] == 1) {
                    if ($task['date_end'] == "") {
                        $task ['date_end'] = time();
                    }
                    $count = $count + ($task['date_end'] - $task['date_start']);
                }
            }
        }
        echo time_nice($count);
        break;
    case "time.tracker" :

        if (is_array($data)) {

            foreach ($data as $task) {
                if ($task['status'] == 1) {
                    ?>
                    <tr>

                        <td><?= $task['name'] ?></td>
                        <td><?= date_nice($task['date_start']) ?></td>
                        <td>
                            <?
                            if ($task['date_end'] != "") {
                                echo date_nice($task['date_end']);
                            } ?>
                        </td>
                        <td>
                            <?
                            if ($task['date_end'] == "") {
                                echo time_nice(time() - $task['date_start']);
                            } else {
                                echo time_nice($task['date_end'] - $task['date_start']);
                            }
                            ?>
                        </td>
                        <td class="btn-col">
                            <button data-id="<?= $task['id'] ?>" class="btn btn-primary btn-stop"><?= i(
                                    'stop'
                                ) ?></button>
                        </td>
                        <td class="btn-col">
                            <button data-id="<?= $task['id'] ?>" class="btn btn-danger btn-remove"><?= i(
                                    'times'
                                ) ?></button>
                        </td>

                    </tr>
                <? }
            }
        }
        break;
}




