<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- css -->
    <?php
    Assets::css(['style']);
    Assets::fonts();
    ?>
</head>

<body>
    <main class="container">
        <nav>
            <div class="logo">
                <img src="./images/logoshape.svg" alt="">
                <span>MailBox</span>
            </div>
            <div class="info">
                <div class="notifications">
                    <i class="fa-light fa-bell"></i>
                    <span><?php echo db::select("SELECT COALESCE(COUNT(msg_id), 0) AS `msgs_count` FROM `messages`")[0]['msgs_count'] ?></span>
                </div>
                <div class="logout">
                    <button id="logout" class="logout">
                        <i class="fa-light fa-right-from-bracket"></i>
                    </button>
                </div>
            </div>
        </nav>
        <section id="content">
            <?php
            $data = db::select("SELECT * FROM messages;");

            $html = '<table class="responsive-table">';
                $html .= '<thead>';
                    $html .= '<tr>';
                        $html .= '<th>ID</th>';
                        $html .= '<th>Name</th>';
                        $html .= '<th>Phone</th>';
                        $html .= '<th>Email</th>';
                        $html .= '<th>Subject</th>';
                        $html .= '<th>Content</th>';
                        $html .= '<th>Date</th>';
                    $html .= '</tr>';
                $html .= '</thead>';
                
                
                $html .= '<tbody>';
                foreach ($data as $row) {
                    $html .= '<tr>';
                        $html .= '<td style="font-weight: 600; text-align: center">' . $row['msg_id'] . '</td>';
                        $html .= '<td style="min-width: 150px">' . $row['msg_name'] . '</td>';
                        $html .= '<td style="min-width: 120px">' . $row['msg_phone'] . '</td>';
                        $html .= '<td>' . $row['msg_email'] . '</td>';
                        $html .= '<td class="min">' . $row['msg_subject'] . '</td>';
                        $html .= '<td class="min">' . $row['msg_content'] . '</td>';
                        $html .= '<td style="min-width: 120px">' . date('Y-m-d', strtotime($row['msg_date'])) . '</td>';
                    $html .= '</tr>';
                }
                $html .= '</tbody>';
            $html .= '</table>';


            // Output the HTML table
            echo $html;

            ?>
        </section>
    </main>


    <!-- js -->
    <?php Assets::js(['main']); ?>
</body>

</html>