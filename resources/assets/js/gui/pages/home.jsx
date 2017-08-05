import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import Sidebar from 'JS/gui/sidebar.jsx';
import Dashboard from 'JS/gui/dashboard.jsx';
import Header from 'JS/gui/header.jsx';

class Home extends Component {

  render() {
    return (
      <div className="container">

        <div className='row'>

          <Header />

        </div>

        <div className="row">

          <div className="col-lg-3 col-sm-12 panel">

            <Sidebar />

          </div>

          <div className="content col-lg-9 col-sm-12">

            <Dashboard />

          </div>

        </div>
      </div>
    );
  }

}

export default Home;
