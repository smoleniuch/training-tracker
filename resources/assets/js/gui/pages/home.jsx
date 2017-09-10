import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import LeftSidebar from 'JS/gui/left_sidebar.jsx';
import Dashboard from 'JS/gui/dashboard.jsx';
import Header from 'JS/gui/header.jsx';

class Home extends Component {

  render() {
    return (
      <div className="container-fluid">

        <div className='row'>

          <Header />

        </div>

        <div className="row">

          <div className="col-lg-2 col-sm-12 panel">

            <LeftSidebar />

          </div>

          <div className="content col-lg-10 col-sm-12">

            <Dashboard />

          </div>

        </div>
      </div>
    );
  }

}

export default Home;
