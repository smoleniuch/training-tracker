import React from 'react';


class LeftSidebar extends React.Component {

  constructor(props){
    super(props)


  }

  render(){

  return  (<div id="sidebar">

        <div className="col-md-3"></div>

        <div className="col-md-6">
            <img className="avatar" src="" />
        </div>

        <div className="col-md-3"></div>


            <div className="col-md-12">
                <ul className="nav nav-pills nav-stacked nav-panel-css">

                    <li><a href=""><span className="glyphicon glyphicon-piggy-bank"></span> My workouts</a></li>
                    <li><a href="/profile/"><span className="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li><a href="/settings/profile"><span className="glyphicon glyphicon-wrench"></span> Settings</a></li>
                    <li><a href="/friends"><span className="glyphicon glyphicon-heart"></span> Friends</a></li>
                    <li><a href="#"><span className="glyphicon glyphicon-envelope"></span> Messages</a></li>

                </ul>

                <form method="post" action="/logout">
                  <button id="log-out-button" className="btn btn-default text-right" type="submit"><span className="glyphicon glyphicon-off"></span> Log out</button>

                </form>

            </div>



    </div>)

  }

}

export default LeftSidebar
