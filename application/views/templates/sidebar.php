
<div id="overlay">
    <div id="sidebar" style="margin-top:8px;">

<style>
            .sidebar_link span{
                margin-left:10px;
            }
            </style>

        <?php if($this->session->userdata('logged') !== null && $this->session->userdata('logged') && $this->session->userdata('type') == "admin" ): ?>
            

            <a href="<?=base_url("dashboard")?>"><div class="sidebar_link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></div></a>
            <a href="<?=base_url("signup")?>"><div class="sidebar_link"><i class="fas fa-user"></i><span>Register User</span></div></a>
            <a href="<?=base_url("lecture-halls")?>"><div class="sidebar_link"><i class="far fa-building"></i><span>Lecture Halls</span></div></a>
            <a href="<?=base_url("student-groups")?>"><div class="sidebar_link"><i class="fas fa-users"></i><span>Student Groups</span></div></a>
            <a href="<?=base_url("lecturer")?>"><div class="sidebar_link"><i class="fas fa-user-tie"></i><span>Lecturers</span></div></a>
            <a href="<?=base_url("subjects")?>"><div class="sidebar_link"><i class="far fa-calendar-alt"></i><span>Subjects</span></div></a>
            <a href="<?=base_url("rubrics")?>"><div class="sidebar_link"><i class="far fa-file-alt"></i></i><span>Rubrics</span></div></a>
            <a href="<?=base_url("time-table-view")?>"><div class="sidebar_link"><i class="fas fa-receipt"></i><span>Time Tables</span></div></a>
            <a href="<?=base_url("booking")?>"><div class="sidebar_link"><i class="fas fa-calendar-check"></i><span>Bookings</span></div></a>
            <a href="<?=base_url("equipment")?>"><div class="sidebar_link"><i class="fas fa-tv"></i><span>Equipment</span></div></a>
            <a href="<?=base_url("request")?>"><div class="sidebar_link"><i class="fas fa-edit"></i><span>Equipment Requests</span></div></a>

        <?php elseif($this->session->userdata('logged') !== null && $this->session->userdata('logged') && $this->session->userdata('type') == "staff" ): ?>
            <a href="<?=base_url("dashboard")?>"><div class="sidebar_link">Dashboard</div></a>
            <a href="<?=base_url("profile")?>"><div class="sidebar_link"><i class="fas fa-user-circle"></i><span>Profile</span></div></a>
            <a href="<?=base_url("lecturer")?>"><div class="sidebar_link"><i class="fas fa-user-tie"></i><span>Lecturers</span></div></a>
            <a href="<?=base_url("lecture-halls")?>"><div class="sidebar_link"><i class="far fa-building"></i><span>Lecture Halls</span></div></a>
            <a href="<?=base_url("time-table-view")?>"><div class="sidebar_link"><i class="fas fa-receipt"></i><span>Time Tables</span></div></a>
            <a href="<?=base_url("free-slots")?>"><div class="sidebar_link"><i class="fas fa-calendar-check"></i><span>Bookings</span></div></a>
            <a href="<?=base_url("equipment/request")?>"><div class="sidebar_link"><i class="fas fa-tv"></i><span>Equipment Request</span></div></a>
            


          
            <?php elseif($this->session->userdata('logged') !== null && $this->session->userdata('logged') && $this->session->userdata('type') == "student" ): ?>
            <a href="<?=base_url("dashboard")?>"><div class="sidebar_link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></div></a>

            <a href="<?=base_url("profile")?>"><div class="sidebar_link"><i class="fas fa-user-circle"></i><span>Profile</span></div></a>
            <a href="<?=base_url("lecture-halls")?>"><div class="sidebar_link"><i class="far fa-building"></i><span>Lecture Halls</span></div></a>
            <a href="<?=base_url("lecturer")?>"><div class="sidebar_link"><i class="fas fa-user-tie"></i><span>Lecturers</span></div></a>

            <a href="<?=base_url("time-table-view")?>"><div class="sidebar_link"><i class="fas fa-receipt"></i><span>Time Tables</span></div></a>
            <a href="<?=base_url("free-slots")?>"><div class="sidebar_link"><i class="fas fa-calendar-check"></i><span>Free Slots</span></div></a>

            <a href="<?=base_url("lecture-halls")?>"><div class="sidebar_link"><i class="far fa-building"></i><span>Lecture Halls</span></div></a>
            <a href="<?=base_url("lecturer")?>"><div class="sidebar_link"><i class="fas fa-user-tie"></i><span>Lecturers</span></div></a>

    <?php else: ?>
            <a href="<?=base_url("dashboard")?>"><div class="sidebar_link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></div></a>
            <a href="<?=base_url("free-slots")?>"><div class="sidebar_link"><i class="fas fa-calendar-check"></i><span>Bookings</span></div></a>
            <a href="<?=base_url("lecture-halls")?>"><div class="sidebar_link"><i class="fas fa-calendar-check"></i><span>Lecture Halls</span></div></a>

        <?php endif?>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#sidebar" ).click(function( event ) {
            event.stopPropagation();
        });

        $('.dismiss, #overlay').on('click', function () {
            hide_sidebar();
        });

        $('#sidebarCollapse').on('click', function () {
            show_sidebar();
        });
    });

    function show_sidebar() {
        console.log("open sidebar");
        $('#overlay').fadeIn(200);
        $('#sidebar').show(200);
        $('#sidebarCollapse').unbind('click');
        $('#sidebarCollapse').on('click', function () {
            hide_sidebar();
        });
    }


    function hide_sidebar() {
        $('#overlay').fadeOut(200);
        $('#sidebar').hide(200);
        $('#sidebarCollapse').unbind('click');
        $('#sidebarCollapse').on('click', function () {
            show_sidebar();
        });

    }
</script>

<style>
    #sidebar{
        position:fixed;
        padding-top:5px;
        top:0px;
        left:0px;
        width:300px;
        height:100%;
        background-color:#2c3e50;
        z-index:998;
        display:none;
    }

    #overlay{
        position:fixed;
        top:0px;
        left:0px;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.7);
        z-index:997;
        display: none;
    }

    #overlay.active {
        display: block;
    }

    .sidebar_link{
        padding: 16px;
        color:white;
        cursor:pointer;
        background-color:rgba(0,0,0,0);
        transition:all 0.2s;
    }

    .sidebar_link:hover{
        background-color:rgba(255,255,255,1);
        color:black;
    }

    .sidebar_link:hover a{
        text-decoration:none;

    }

    .sidebar_link a:hover{
        text-decoration:none;
    }

</style>