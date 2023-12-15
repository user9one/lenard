<template lang="">
    <div class="flex flex-row  w-full"><!--Main-->
      <aside class="sticky top-0 shadow-lg shadow-gray-500 w-80 h-screen"><!--Side Nav-->
            
            <div class="flex items-center justify-center h-14 mt-20">
           <img src="\src\mmsu-logo.png" alt="Logo" class="w-36" />
        </div>
            <div class="grid grid-cols-1 mt-20">
              <router-link to="/admin/admindashboard" class="block px-4 py-2 text-gray-800 router-link" trigger="hover" active-class="active-link">
                    <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/wmwqvixz.json" trigger="morph" state="morph-home-3" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Dashboard
                    </span>
                </router-link>
                <router-link to="/admin/admincalendar" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/wmlleaaf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Calendar
                    </span>
                </router-link> 
  
             <!--Updated by jhn-->
             <router-link
                  to="/admin/adminreservation"
                  class="block px-4 py-2 text-gray-800 router-link"
                  active-class="active-link"
                >
                  <span class="flex items-center">
                    <lord-icon
                      src="https://cdn.lordicon.com/omiqopzf.json"
                      trigger="hover"
                      colors="primary:#ffffff"
                      class="w-7 h-7 mr-2"
                    />
                    Reservation
                    <lord-icon
                      @click="toggleExpand"
                      v-if="!expanded"
                      src="https://cdn.lordicon.com/xcrjfuzb.json"
                      trigger="hover"
                      state="hover-arrow-down-2"
                      colors="primary:#ffffff"
                      class="w-5 h-5 ml-20"
                    />
                    <lord-icon
                      @click="toggleExpand"
                      v-if="expanded"
                      src="https://cdn.lordicon.com/ternnbni.json"
                      trigger="hover"
                      state="hover-arrow-up-2"
                      colors="primary:#ffffff"
                      class="w-5 h-5 ml-20"
                    />
                  </span>
                </router-link>

                <router-link
                  v-if="expanded"
                  to="/admin/approved"
                  class="px-4 py-2 text-gray-800 router-link"
                  active-class="active-link"
                >
                <span class="flex items-center ml-8">
                  <lord-icon src="https://cdn.lordicon.com/lomfljuq.json" trigger="morph"  colors="primary:#ffffff" class="w-7 h-7 mr-2" /> 
                   Approved Request
                </span>
                </router-link>

                <router-link to="/admin/adminfacilities" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                      <lord-icon src="https://cdn.lordicon.com/ipnwkgdy.json"  trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Facilities 
                    </span>
                </router-link>
                <router-link to="/admin/adminservices" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/iazmohzf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Services 
                    </span>
                </router-link>            
                <router-link to="/admin/adminreport" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                    <span class="flex items-center">
                        <lord-icon src="https://cdn.lordicon.com/yrbmguoo.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                        Report 
                    </span>
                </router-link> 
                <router-link to="/admin/login" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                  <button @click="logout" class="flex items-center">
                    <lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                    Logout
                  </button>
                </router-link>
            </div>
        </aside><!--Side Nav End-->
    
        <div class="bg-gray-100 shadow-xl h-screen w-full" style="overflow: auto"><!--Content-->
            <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400"><!--Sub Nav-->
                <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
                    <span class="flex items-center text-white text-xl font-semibold ml-4" style="font-family: Advantage">
                        <img src="\Icons\Reservation.gif" alt="Reservation Icon" class="w-10 h-10 mr-2" />
                        Reservation
                    </span>
                </div>
            </div><!-- Sub Nav End --> 

            <div class="grid grid-cols-1 flex flex-row"><!--Sub Nav 1-->
                <div class="bg-shadow-gray-100 shadow-md h-12 flex justify-start" style="background-color: #c0c0c0">
                    <span class="flex items-center text-black text-lg italic font-semibold ml-4" style="font-family: Advantage">
                        <img src="\src\mmsu-logo.png" alt="Logo"  class="w-12 h-10 mr-2" />
                        Facility Reservation Request
                    </span>
                </div>  
            </div> <!--Sub Nav End 1-->
            

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                    <thead class="text-xs text-white uppercase bg-green-800 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Facility
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Purpose
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Event Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Participants
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date of Event
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Details
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-400 border-b border-green-800"  v-for="reservation in reservations" :key="reservation.id">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                               Facility Name
                            </th>
                            <td class="px-6 py-4">
                               {{ reservation.event_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ reservation.purpose }}
                            </td>
                            <td class="px-6 py-4">
                                {{ reservation.participants }}
                            </td>
                            <td class="px-6 py-4">
                                {{ reservation.eventDateFrom }}
                            </td>
                            <td class="px-6 py-4">
                                {{ reservation.startTime }} to {{ reservation.endTime }}
                            </td>
                            <td class="px-6 py-4">
                              <div :class="[statusClass, 'hover:bg-white-200', 'text-white', 'font-semibold', 'py-2', 'px-4', 'rounded-md']">{{ status }}</div>
                            </td>
                            <td class="px-6 py-4">
                              <button @click="openModal(reservation)" class="bg-green-800 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 ">View</button>
                            </td>
                            <td class="px-6 py-4">
                              <lord-icon  @click="approveReservation" id="aprroved" src="https://cdn.lordicon.com/oqdmuxru.json" trigger="hover" colors="primary:#0a5c15" class="w-9 h-9 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 " ></lord-icon>
                              <lord-icon  @click="cancelledReservation" id="cancelled" src="https://cdn.lordicon.com/zxvuvcnc.json" trigger="hover" colors="primary:#c71f16" class="w-9 h-9 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 " ></lord-icon>
                              <lord-icon @click="rescheduleReservation" id="rescheduled" src="https://cdn.lordicon.com/wmlleaaf.json" trigger="morph" colors="primary:#e8e230" state="morph-calendar" class="w-9 h-9 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300"></lord-icon>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="overlay"></div>
                <div class="bg-gray-200 w-1/2 h-1/2 rounded-md shadow-lg">
                    <!-- Modal content goes here -->
                    <div class="flex justify-end">
                        <lord-icon src="https://cdn.lordicon.com/zxvuvcnc.json" trigger="hover" colors="primary:#0c4b05"
                         @click="closeModal" class="w-8 h-8 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:duration-300 rounded-md"></lord-icon>
                    </div>
                    <!--Content Na-->
                      <div class="justify-center grid grid-cols-2 gap-14 m-5 text-lg font-semibold" style="font-family: Calibri">
                          <div class="justify-between grid grid-cols-2 gap-4 w-full">
                            <div class="bg-green-800"><!--Reservation-->
                              <div>Event Name:</div>
                              <div>Purpose:</div>
                              <div>Participants:</div>
                              <div>Event Date:</div>
                              <div>Start Time:</div>
                              <div>End Time:</div>
                            </div>
                            <div class="bg-green-700"><!--Contact info-->
                              <div>Name: </div>
                              <div>Email: </div>
                              <div>Phone: </div>
                              <div>MMSU Affliliated: </div>
                              <div>Univ_id: </div>
                              <div>College: </div>
                              <div>Department: </div>
                            </div>
                            <div class="col-span-2 bg-green-500"><!--Services-->
                              <div>Chairs: </div>
                              <div>Quantity: </div>
                              <div>Remarks:</div>
                            </div>
                            <!-- Add more fields as needed -->
                        </div>
                      </div>
                    <!--Content End-->
                </div>
              </div>
            <!-- Modal End -->   
        </div><!--Content End-->
    </div>
  </template>
  <script>
import axios from 'axios';

    export default {
        data() {
          return {
            expanded: true,
            reservations: [],
            isSidePanelOpen: true,
            showModal: false,
            selectedReservation: null, // Add this line
            status: 'Pending',
            notification: null,
          };
    },
    mounted () {
      this.loadAdminReservations();
    },
    methods: {
      toggleExpand(){
        this.expanded = !this.expanded;   
      },

      loadAdminReservations() {
        axios.get('/reservations') // Adjust the API endpoint to fetch admin-specific reservations
          .then(({ data }) => {
            this.reservations = data;
          })
          .catch(error => {
            console.error('Error loading admin reservations:', error);
          });
      },

      showNotification(message, statusClass) {
        this.notification = { message, statusClass };
        setTimeout(() => {
          this.notification = null;
        }, 3000); // Hide the notification after 3 seconds (adjust as needed)
      },
      approveReservation() {
        this.status = 'Approved';
        this.showNotification('Reservation Approved!', 'notification-success');
      },
      cancelledReservation() {
        this.status = 'Cancelled';
        this.showNotification('Reservation Cancelled!', 'notification-cancelled');
      },
      rescheduleReservation() {
        this.status = 'Reschedule';
        this.showNotification('Reservation Rescheduled!', 'notification-reschedule');
      },
      toggleSidePanel() {
        this.isSidePanelOpen = !this.isSidePanelOpen;
      },
      openModal(reservation) {
        this.selectedReservation = reservation;
        this.showModal = true;
      },
      closeModal() {
        this.showModal = false;
      },
    },
    computed: {
      statusClass() {
        return {
          'bg-yellow-500': this.status === 'Pending',
          'bg-green-800': this.status === 'Approved',
          'bg-red-500': this.status === 'Cancelled',
          'bg-yellow-400': this.status === 'Reschedule', // Use 'bg-red-800' for the Reschedule status
          // Add more conditions for other statuses if needed
        };
      },
    },
  };
  </script>
  
  <style lang="">
  /* Add any additional styles for the modal here */
  </style>
  
  <style scoped>
  /* ... (your existing styles) */
  /* Side Navigation Hover Effect Panel */
  .router-link:hover {
    color: white;
    background-color: #0C4B05;
  }
  .active-link {
    color: white;
    background-color: #0C4B05;
  }

  .slide-enter-active, .slide-leave-active {
  transition: transform 0.3s ease-in-out;
  
}

.slide-enter, .slide-leave-to {
  transform: translateX(-100%);
}

.transition-transform {
  transition: transform 0.3s ease-in-out;
}

.transition-margin {
  transition: margin-right 0.3s ease-in-out;
}

.slide-main-enter-active, .slide-main-leave-active {
  transition: margin-right 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

.slide-main-enter, .slide-main-leave-to {
  margin-right: 0;
}
.overlay {
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value for transparency */
    z-index: -1; /* Push the overlay behind the modal */
  }
  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: #4caf50; /* Green background color */
    color: white;
    border-radius: 5px;
    z-index: 1;
  }

  .notification-success {
    background-color: #4caf50; /* Green background color for success */
    color: white;
  }

  .notification-reschedule {
    background-color: #4caf50; /* Red background color for error */
    color: white;
  }
  </style>