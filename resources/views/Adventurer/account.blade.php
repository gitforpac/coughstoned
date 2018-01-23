<style type="text/css">
    /***** DASHBOARD *****/
            .profile-div {
               margin: 1px red; 
               display: flex;
               flex-direction: column;
            }

            .flex-pic{
              margin: 1px red;
              flex: 1;
            }

            .flex-detail{
              margin: 1px red;
              flex: 1;
            }

            .flex-notif-head{
              margin: 1px red;
              flex: 1;

            }

            .flex-notif{
              margin: 1px red;
              flex: 1;
            }
/***** *****/
</style>
@extends('Adventurer.layout')
    @section('content')
    <h1> ACCOUNT </h1>
    <div class="profile-div">  
        <div class="flex-pic">
            <p>insert pic</p>
        </div>
        <div class="flex-detail">
            <p>insert details</p>
        </div>
        <div class="flex-notif-head">
            <p>notif header</p>
        </div>
        <div class="flex-notif">
            <p>notifs go here</p>
        </div>
    </div>
    @endsection