<?php
require_once __DIR__ . '../../../config/session.php';
Session::init();
require_once __DIR__ . '../../../model/user.php';
$user = new userModel();
require_once __DIR__ . '../../../model/posts.php';
$post = new postModel();
?>
<!DOCTYPE html>
<html lang="en">

<?php
require __DIR__ . '/ins-admin/headerAdmin.php';

?>

<body translate="no">
    <div class="container-fluid p-0">

        <!-- Header -->
        <?php
        require __DIR__ . '/ins-admin/menu.php';
        ?>

        <!-- container -->
        <div class="row mt-5" id="body-row">

            <!-- Side bar -->
            <?php
            require __DIR__ . '/ins-admin/sidebar.php';
            ?>

            <div class="col p-0">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <!-- header -->

                                <div class="recent_heading d-flex justify-content-start">
                                    <h4>New</h4>
                                    <a href="index.php?c=chat&&a=newChat"><i class="far fa-plus-square pt-1 pl-3"></i></a>
                                </div>
                                <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar" placeholder="Search">
                                        <span class="input-group-addon">
                                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <!-- List chat -->
                            <div class="inbox_chat">
                                <?php
                                foreach ($result as $value) {
                                    $name = $user->getName($value['receiver_id']);
                                ?>
                                    <a href="?c=chat&a=detailChat&receiver_id=<?= $value['receiver_id'] ?>">
                                        <div class="chat_list <?= ($value['status'] && $value['sender_id'] != Session::get('user_id')) ? 'new_chat' : 'active_chat' ?> <?= (isset($_GET['receiver_id']) && $_GET['receiver_id'] == $value['receiver_id']) ? 'action_chat' : '' ?>">
                                            <div class="chat_people">
                                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                <div class="chat_ib">
                                                    <h5><?= $name['name'] ?> <span class="chat_date"><?= date('d-M | g:i a', strtotime($value['time']))  ?></span></h5>
                                                    <p><?= $value['message'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- List message -->



                        <div class="mesgs">
                            <div class="msg_history">

                                <?php
                                foreach ($detail_chat as $value) {

                                ?>
                                    <?= ($value['sender_id'] == Session::get('user_id')) ?
                                        '<div class="outgoing_msg">
                                            <div class="sent_msg">
                                                <p>' . $value['message'] . '</p>
                                                <span class="time_date">' . date('d-M | g:i a', strtotime($value['time'])) . '</span>
                                            </div>
                                        </div>' :
                                        '<div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <p>' . $value['message'] . '</p>
                                                    <span class="time_date">' . date('d-M | g:i a', strtotime($value['time'])) . '</span>
                                                </div>
                                            </div>
                                        </div>';
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="type_msg">
                                <form class="input_msg_write" action="?c=chat&a=sendMess&receiver_id=<?= $value['receiver_id'] ?>" method="POST">
                                    <input type="text" class="write_msg" name="message" placeholder="Type a message" />
                                    <button class="msg_send_btn ml-3" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>