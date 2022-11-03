<?php

$this->extend("layout/main");
$this->section("body")

?>


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Booking Calendar</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Calendar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Full-calendar ] start -->
                                <div class="col-sm-12">
                                    <div class="card fullcalendar-card">
                                        <div class="card-header">
                                            <h5>Booking Calendar</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12">
                                                    <div id='calendar' class='calendar'></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Full-calendar ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
      const events = <?php echo json_encode($calendarAPI); ?>;
      const calendarEvent = events.map(event => {
        return {
          title: event.title,
          start: event.check_in,
          end: event.check_in,
          backgroundColor: '#f1c40f',
          textColor: '#fff'
        }
      });
</script>

    <?= $this->endSection(); ?>