<?php
    // echo "wow you have come so far";
    // die();

    // var_dump($event_list);
    // die();
?>

<main class="flex">
    <div class="event-list">
        <table>
            <tr>
                <th>location</th>
                <th>vs</th>
                <th>date</th>
            </tr>
        <?php
            foreach ($event_list as $event) {
                echo "
                <tr>
                    <td>$event->e_location</td>
                    <td><img src='img/$event->e_team1_img'>VS<img src='img/$event->e_team2_img'></td>
                    <td>$event->e_date</td>
                </tr>
                ";
            }
        ?>
        </table>
    </div>
    <div class="event-filter"></div>
</main>