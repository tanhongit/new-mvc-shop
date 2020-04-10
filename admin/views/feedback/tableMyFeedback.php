<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Truy Xuất Dữ Liệu <strong>"Your Feedback"</strong> </h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Nội dung</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $stt = 0;
                            foreach ($feedbacks as $feedback) : $stt++; ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td><?php echo $feedback['name'] ?></td>
                                    <td><?= get_time($feedback['createTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                    <td><?= $feedback['email'] ?></td>
                                    <td><?php echo $feedback['phone'] ?></td>
                                    <td><?php echo $feedback['subject'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>