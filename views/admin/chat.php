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
                                    <h4>Chat</h4>
                                    <a href="index.php?c=chat&&a=newChat"><i class="far fa-plus-square pt-1 pl-3"></i></a>
                                </div>

                                <!-- Search -->
                                <div class="srch_bar">
                                    <form class="stylish-input-group" action="index.php?c=chat&a=searchMess" method="POST">
                                        <input type="text" name="input" class="search-bar" autocomplete="off" autofocus placeholder="Search">
                                        <span class="input-group-addon">
                                            <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        </span>
                                    </form>
                                </div>
                            </div>

                            <small class="text-danger font-italic d-flex justify-content-start mb-3">
                                <?php if (isset($_SESSION['chatResults'])) echo Session::get('chatResults');
                                else 
                                    if (isset($_SESSION['chatSearchErr'])) echo Session::get('chatSearchErr');

                                else echo ''; ?>

                            </small>
                            <!-- List chat -->
                            <div class="inbox_chat">
                                <?php
                                foreach ($result as $value) {
                                    $name = $user->getName(($value['sender_id'] != Session::get('user_id')) ? $value['sender_id'] : $value['receiver_id']);
                                    $avt = $user->searchByID(($value['sender_id'] != Session::get('user_id')) ? $value['sender_id'] : $value['receiver_id'])->fetch_assoc();
                                    // print_r($avt['avatar']);
                                    // if(!empty($avt){
                                    //     $avt = $avt->fetch_assoc();
                                    // }
                                ?>
                                    <a href="?c=chat&a=detailChat&receiver_id=<?= $value['receiver_id'] ?>&sender_id=<?= $value['sender_id'] ?>">
                                        <div class="chat_list <?= ($value['status'] == 1 && $value['sender_id'] != Session::get('user_id')) ? 'new_chat' : 'active_chat' ?> <?= (isset($_GET['receiver_id']) && $_GET['receiver_id'] == $value['receiver_id']) ? 'action_chat' : '' ?>">
                                            <div class="chat_people">
                                                <div class="chat_img"><img src="<?= (!empty($avt['avatar'])) ? '../img/avt-user/' . $avt['avatar'] : 'https://ptetutorials.com/images/user-profile.png' ?>" alt="sunil"> </div>
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
                            <div class="msg_history" id="detail">

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
                                <form class="input_msg_write" action="?c=chat&a=sendMess&receiver_id=<?= ($_GET['receiver_id'] != Session::get('user_id')) ? $_GET['receiver_id'] : $_GET['sender_id'] ?>" method="POST">
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