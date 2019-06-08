<?php

// echo $filter;

?>

<main class="flex">
    <div class="event-list">
        <div class="event-filter">
            <ul>
                <li <?php if ($filter == 'lcs') { echo "class='onpage'"; } ?>><a href="./events-lcs"><img src='https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Flcs-79qe3e0y.png' alt=""></a></li>
                <li <?php if ($filter == 'lek') { echo "class='onpage'"; } ?>><a href="./events-lek"><img src="https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Feu-lcs-dgpu3cuv.png" alt=""></a></li>
                <li <?php if ($filter == 'lck') { echo "class='onpage'"; } ?>><a href="./events-lck"><img src="https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Flck-7epeu9ot.png" alt=""></a></li>
                <li <?php if ($filter == 'msi') { echo "class='onpage'"; } ?>><a href="./events-msi"><img src="https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Fmsi-iu1t0cjd.png" alt=""></a></li>
                <li <?php if ($filter == 'lcl') { echo "class='onpage'"; } ?>><a href="./events-lcl"><img src="https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Fljl-japan-j27k8oms.png" alt=""></a></li>
                <li <?php if ($filter == 'world') { echo "class='onpage'"; } ?>><a href="./events-world"><img src="https://am-a.akamaihd.net/image/?resize=120:120&f=https%3A%2F%2Flolstatic-a.akamaihd.net%2Fesports-assets%2Fproduction%2Fleague%2Fworlds-3om032jn.png" alt=""></a></li>
            </ul>
        </div>
        <table>
        <?php

            if (!count($event_list)) {
                echo "<p style='text-align: center; margin-top: 30px;'>no events found</p>";
            } else {
                foreach ($event_list as $event) {

                    $timestamp = strtotime($event->e_date);
                    $date = date("l d", $timestamp);
                    $time = date('G:i', $timestamp);

                    echo "
                    <tr>
                        <td>
                            $event->e_location
                        </td>
                        <td>
                            <p>$event->e_team1</p>
                            <img src='img/$event->e_team1_img' alt='$event->e_team1'>
                        </td>
                        <td>
                            VS
                        </td>
                        <td>
                            <img src='img/$event->e_team2_img' alt=''$event->e_team2>
                            <p>$event->e_team2</p>
                        </td>
                        <td>
                            $date $time
                        </td>
                    </tr>
                    ";
                }
            }
        ?>
        </table>
    </div>
</main>