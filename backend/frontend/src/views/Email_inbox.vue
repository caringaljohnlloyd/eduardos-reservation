<template>
     <TopAdmin/>
        <SidebarAdmin/>
     <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
          <div class="content">	<!-- ====================================
	——— EMAIL WRAPPER
	===================================== -->
<div class="email-wrapper rounded border bg-white">
  <div class="row no-gutters justify-content-center">
    <div class="col-lg-4 col-xl-3 col-xxl-2">
      <div class="email-left-column email-options p-4 p-xl-5">
        <a href="email-compose.html" class="btn btn-block btn-primary btn-pill mb-4 mb-xl-5">Compose</a>
        <ul class="pb-2">
          <li class="d-block active mb-4">
            <a href="email-inbox.html">
              <i class="mdi mdi-download mr-2"></i> Inbox</a>
            <span class="badge badge-secondary">20</span>
          </li>
          <li class="d-block mb-4">
            <a href="#">
              <i class="mdi mdi-star-outline mr-2"></i> Favorite</a>
            <span class="badge badge-secondary">56</span>
          </li>
          <li class="d-block mb-4">
            <a href="#">
              <i class="mdi mdi-playlist-edit mr-2"></i> Drafts</a>
          </li>
          <li class="d-block mb-4">
            <a href="#">
              <i class="mdi mdi-open-in-new mr-2"></i> Sent Mail</a>
          </li>
          <li class="d-block mb-4">
            <a href="#">
              <i class="mdi mdi-trash-can-outline mr-2"></i> Trash</a>
          </li>
        </ul>
        <p class="text-dark font-weight-medium">Labels</p>
        <ul>
          <li class="mt-4">
            <a href="#">
              <i class="mdi mdi-checkbox-blank-circle-outline text-primary mr-3"></i>Work</a>
          </li>
          <li class="mt-4">
            <a href="#">
              <i class="mdi mdi-checkbox-blank-circle-outline text-warning mr-3"></i>Private</a>
          </li>
          <li class="mt-4">
            <a href="#">
              <i class="mdi mdi-checkbox-blank-circle-outline text-danger mr-3"></i>Family</a>
          </li>
          <li class="mt-4">
            <a href="#">
              <i class="mdi mdi-checkbox-blank-circle-outline text-success mr-3"></i>Friends</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-lg-8 col-xl-9 col-xxl-10">
      <div class="email-right-column p-4 p-xl-5">
        <!-- Email Right Header -->
        <div class="email-right-header mb-5">
          <!-- head left option -->
          <div class="head-left-options">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">Select All</label>
            </div>
            <button type="button" class="btn btn-icon btn-outline btn-rounded-circle">
              <i class="mdi mdi-refresh"></i>
            </button>
            <div class="dropdown">
              <button class="btn dropdown-toggle border rounded-pill" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- head right option -->
          <div class="head-right-options">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn border btn-pill">
                <i class="mdi mdi-chevron-left"></i>
              </button>
              <button type="button" class="btn border btn-pill">
                <i class="mdi mdi-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="border border-top-0 rounded table-responsive email-list">
          <table class="table mb-0 table-email">
            <tbody>
              <tr class="unread">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="star">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Walter Reuter
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="badge badge-primary">New</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nihil illum animi vitae beatae. Dolorum eos tempora ex autem voluptatum sint voluptas, explicabo debitis perferendis distinctio labore quibusdam quam quaerat quas architecto minus tempore.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  Mar 18
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Antoine Chevallier
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Duis nec ligula sed augue consequat mattis sed eget lacusq uisque erat urna, gravida id orci in, euismod scelerisque tortor. In hac habitasse platea dictumst. Aenean efficitur varius volutpat. Donec eu faucibus leo. Quisque lacinia tempor quam sit amet consectetur.
                </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  Mar 10
                </td>
              </tr>
              <tr class="unread">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Nicolas Dumas
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block">
                    <span class="badge badge-primary">New</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - In hac habitasse platea dictumst. Morbi eu elit vitae nunc porttitor ornare. Etiam tristique lorem leo, vitae eleifend arcu semper et. Sed eget erat sit amet tortor ultrices vestibulum nec et nunc. Nunc lobortis turpis mi, sit amet lacinia quam bibendum in.
                  </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  Feb 20
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="favorites text-warning">
                  <i class="mdi mdi-star"></i>
                </td>
                <td class="sender-name text-dark">
                  Walter Reuter
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Egestas vitae dapibus sit amet pretium ut nulla fusce euligula quis justo vulputate luctus quis eu libero. Praesent ultricies elit sem, eu iaculis ipsum viverra a. Aenean pretium a diam vitae consectetur. Phasellus pretium, nunc vitae vulputate consequat.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  Feb 2
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Sylvie Rey
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Sed iaculis ipsum lacus, in conse ctetur elit solli citu dinsed fusce at odio cursus orci rhoncus imperdiet. Proin cursus consequat sem, ut rutrum sapien facilisis vitae. Maecenas massa massa, mollis eget nisl non, accumsan gravida turpis. Quisque quis.
                  </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  Jan 31
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Nath Collin
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Nam dapibus at ex a porta. Aenean arcu dui, eleifend sedornare ornare, accumsan id lectus. Vivamus non nisi eget metus bibendum placerat iaculis a nibh. Phasellus ut orci lacinia, gravida est eget, rhoncus diam. Pellentesque nulla felis, ultrices nec. 
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  Jan 22
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="favorites text-warning">
                  <i class="mdi mdi-star"></i>
                </td>
                <td class="sender-name text-dark">
                  Diane Gay
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block">
                    <span class="badge badge-success">Work</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Integer ac justo augue. Aenean pellentesque, eliteget hendrerit pharetra, augue elit porttitor nunc, vitae pulvinar sem dui eget velit. Morbi iaculis vestibulum risus, non consequat ex vulputate nec. Sed venenatis turpis vulputate pellentesque posuere.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  Jan 15
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Colette Bazin
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="badge badge-warning">Family</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Curabitur eget elementum justo. Phasellus lectus magna, vulputate eget tempor ac, elementum in nulla. Nam volutpat quam vitae vehicula consectetur. Cras placerat mauris ut erat convallis, sagittis volutpat lorem interdum phasellus lectus elementum.
                  </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  Jan 09
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Marine Aubry
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Metus in et dui eu urna viverra semper. Aenean mollis ornare sem eu hendrerit. Cras ac viverra elit. Integer ullamcorper pharetra orci, at feugiat turpis aliquam nec. Vivamus vel metus non est lacinia iaculis at sed tortor. Vivamus vehicula ornare erat.
                  </a>
                </td>
                <td class="attachment">
                </td>
                <td class="date">
                  Jan 1
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Laurent Pons
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Duis ante nunc, accumsan ut suscipit at, suscipit in leo quisque in urna in metus elementum molestie. Sed vitae efficitur tellus. Pellentesque eu ligula vel orci dictum tempor. Vestibulum efficitur tincidunt lectus at aliquam. Nullam quis luctus nisl.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  12/19/17
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Diane Gay
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="badge badge-primary">New</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Sed vel dictum erat. Proin efficitur fringilla libe roaport titor enim varius quis. Phasellus quis molestie turpis. Mauris ut lectus a sapien pulvinar sagittis quis blandit turpis. Etiam porta congue eros ac consectetur. Vestibulum ante ipsum primis.
                  </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  12/5/17
                </td>
              </tr>
              <tr class="unread">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Roger Labbe
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="badge badge-primary">New</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Curabitur sem nunc, pharetra eu turpis sed, tristique condimentum justo. Mauris auctor sollicitudin elit, ut bibendum libero pulvinar consectetur. Nunc et risus eleifend, iaculis mi vitae, rhoncus libero. Nam fermentum posuere accumsan. Nunc nec malesuada leo.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  11/10/17
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Juliette Ferreira
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    -  Quisque congue ligula ut facilisis pellentesque. Aenean feugiat, turpis ut consequat sodales, lacus nisi sollicitudin mi, ac ultrices arcu orci eget sapien. Sed varius velit neque, eget venenatis neque suscipit a. Suspendisse nec facilisis neque. Curabitur ac.
                  </a>
                </td>
                <td class="attachment">
                  <i class="mdi mdi-paperclip"></i>
                </td>
                <td class="date">
                  11/2/17
                </td>
              </tr>
              <tr class="read">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Anne Lesage
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block">
                    <span class="badge bg-purple ">Friends</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Vivamus facilisis sodales imperd quisque velegestas elit. Praesent id tellus egestas mauris laoreet laoreet amet at sapien. Pellentesque elementum neque a bibendum dapibus. Aliquam euismod, nisi sed congue congue, elit diam elementum sapien.
                  </a>
                </td>
                <td class="attachment">

                </td>
                <td class="date">
                  10/10/17
                </td>
              </tr>
              <tr class="unread">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox" />
                    <div class="control-indicator"></div>
                  </label>
                </td>
                <td class="">
                  <i class="mdi mdi-star-outline"></i>
                </td>
                <td class="sender-name text-dark">
                  Jean Poirier
                </td>
                <td class="">
                  <a href="email-details.html" class="text-default d-inline-block text-smoke">
                    <span class="badge badge-primary">New</span>
                    <span class="subject text-dark">
                      Statement belting with double
                    </span>
                    - Risus nec ligula imperdiet, sit amet fermentum felis pretium. In sit amet enim tristique, mollis arcu ultricies, mollis libero. Proin at euismod mauris. Morbi eu nibh eu nulla convallis pulvinar. Ut ac cursus nunc. Integer accumsan aliquet commodo.
                  </a>
                </td>
                <td class="attachment">
  
                </td>
                <td class="date">
                  10/1/17
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
          
        </div>
        
     
    
                    <!-- Card Offcanvas -->
                    <div class="card card-offcanvas" id="contact-off" >
                      <div class="card-header">
                        <h2>Contacts</h2>
                        <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
                      </div>
                      <div class="card-body">

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-01.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span class="discribe">Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-02.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Walter Reuter</span>
                              <span>Developer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-03.jpg" alt="User Image">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Larissa Gebhardt</span>
                              <span>Cyber Punk</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-04.jpg" alt="User Image">
                            </a>

                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Albrecht Straub</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-05.jpg" alt="User Image">
                              <span class="active bg-danger"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Leopold Ebert</span>
                              <span>Fashion Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-06.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                      </div>
                    </div>
                    <EndAdmin/>
     </template>

     <style>
 @import '@/assets/css/style.css';
    </style>
    <script>
    import TopAdmin from '@/components/TopAdmin.vue';
    import SidebarAdmin from '@/components/SidebarAdmin.vue';
    import EndAdmin from '@/components/EndAdmin.vue';
   
   export default {
    name: 'analytics',
     components: {
       TopAdmin,SidebarAdmin,EndAdmin
     }
   }
   </script>