

<style>
    header {
      height: 200px;
      line-height: 200px;
      text-align: center;
      background-color: #5e6e8d;
      color: #FFF;
    }
    header h1 {
      font-size: 20px;
      font-size: 1.25rem;
    }
    .cd-popup-trigger {
      display: block;
      width: 170px;
      height: 50px;
      line-height: 50px;
      margin: 3em auto;
      text-align: center;
      color: #FFF;
      font-size: 14px;
      font-size: 0.875rem;
      font-weight: bold;
      text-transform: uppercase;
      border-radius: 50em;
      background: #35a785;
      box-shadow: 0 3px 0 rgba(0, 0, 0, 0.07);
    }

    .cd-popup {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 110%;
      background-color: rgba(94, 110, 141, 0.9);
      opacity: 0;
      visibility: hidden;
      -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
      -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
      transition: opacity 0.3s 0s, visibility 0s 0.3s;
    }
    .cd-popup.is-visible {
      opacity: 1;
      visibility: visible;
      -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
      -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
      transition: opacity 0.3s 0s, visibility 0s 0s;
    }

    .cd-popup-container {
      position: relative;
      width: 100vw !important;
      height:100vh !important;
      background: #FFF;
      border-radius: .25em .25em .4em .4em;
      -webkit-transform: translatex(-400px);
      -moz-transform: translatex(-400px);
      -ms-transform: translatex(-400px);
      -o-transform: translatex(-400px);
      transform: translatex(-400px);
      /* Force Hardware Acceleration in WebKit */
      -webkit-backface-visibility: hidden;
      -webkit-transition-property: -webkit-transform;
      -moz-transition-property: -moz-transform;
      transition-property: transform;
      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      transition-duration: 0.5s;
    }
    .cd-popup-container p {
      padding: 0px;
      margin:0px;
    }

    .cd-popup-container .cd-popup-close {

    }
    .cd-popup-container .cd-popup-close::before, .cd-popup-container .cd-popup-close::after {

    }
    .cd-popup-container .cd-popup-close::before {
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
      left: 8px;
    }
    .cd-popup-container .cd-popup-close::after {
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
      right: 8px;
    }
    .is-visible .cd-popup-container {
      -webkit-transform: translateX(0);
      -moz-transform: translateX(0);
      -ms-transform: translateX(0);
      -o-transform: translateX(0);
      transform: translateX(0);
    }

    div.ex3 {

      overflow: auto !important;

    }
</style>
