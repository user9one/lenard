<template>
  <div class="flex flex-row w-full">
    <!-- Main -->
    <aside class="sticky top-0 shadow-lg shadow-gray-500 w-80 h-screen">
      <!-- Side Nav -->
      <div class="flex items-center justify-center h-14 mt-20">
        <img src="\src\mmsu-logo.png" alt="Logo" class="w-36" />
      </div>
      <div class="grid grid-cols-1 mt-20 divide-y divide-dashed">
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
              <router-link to="/admin/adminreservation" class="block px-4 py-2 text-gray-800 router-link" active-class="active-link">
                  <span class="flex items-center">
                    <lord-icon src="https://cdn.lordicon.com/omiqopzf.json" trigger="hover" colors="primary:#ffffff" class="w-7 h-7 mr-2" />
                      Reservation 
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
    </aside>
    <!-- Side Nav End -->

    <div class="bg-gray-100 shadow-xl h-screen w-full" style="overflow: auto">
      <!-- Content -->
      <div class="grid grid-cols-1 flex flex-row border-b-4 border-yellow-400">
        <!-- Sub Nav -->
        <div class="shadow-md h-20 flex justify-start" style="background-color: #0C4B05">
          <span class="flex items-center text-white text-xl font-semibold ml-4" style="font-family: Advantage">Calendar</span>
        </div>
        <!-- Sub Nav End -->
      </div>

      <!-- Calendar -->
      <!-- Render FullCalendar only when events are available -->
          <div v-if="events.length > 0">
            <FullCalendar v-bind:options="calendarOptions" :events="events" />
          </div>

      <!-- Modal -->
      <!-- Modal -->
      <div v-if="showModal && selectedReservation" class="modal">
        <div class="modal-content">
          <!-- Display the selectedReservation fields -->
          <div class="justify-center gap-14 m-5 text-lg font-semibold" style="font-family: Calibri">
            <h2 class="text-center">Reservation Details</h2>
            <div class="bg-white rounded-lg shadow p-4">
              <div>Event Name: {{ selectedReservation.reservation_details.event_name }}</div>
              <div>Purpose: {{ selectedReservation.reservation_details.purpose }}</div>
              <div>Participants: {{ selectedReservation.reservation_details.participants }}</div>
              <div>Event Date: {{ selectedReservation.reservation_details.eventDateFrom }} to {{ selectedReservation.reservation_details.eventDateTo }}</div>
              <div>Start Time: {{ selectedReservation.reservation_details.startTime }}</div>
              <div>End Time: {{ selectedReservation.reservation_details.endTime }}</div>
            </div>
            <br>
            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow p-4">
              <div>Name: {{ selectedReservation.reservation_details.fname }} {{ selectedReservation.reservation_details.mname }} {{ selectedReservation.reservation_details.lname }}</div>
              <div>Email: {{ selectedReservation.reservation_details.email }}</div>
              <div>Phone: {{ selectedReservation.reservation_details.phone }}</div>
              <div v-if="selectedReservation.reservation_details.mmsu_affiliated === 1">
                        MMSU Affiliated: Yes
                        <div v-if="selectedReservation.reservation_details.university_id !== null">Univ_id: {{ selectedReservation.reservation_details.university_id }}</div>
                        <div v-if="selectedReservation.reservation_details.college !== null">College: {{ selectedReservation.reservation_details.college }}</div>
                        <div v-if="selectedReservation.reservation_details.department !== null">Department: {{ selectedReservation.reservation_details.department }}</div>
                    </div>
                    <div v-else>
                        MMSU Affiliated: No
                        <div v-if="selectedReservation.reservation_details.officeAgency !== null">Office/Agency: {{ selectedReservation.reservation_details.officeAgency }}</div>
                    </div>
            </div>

            
            <br>
            <!-- Services Details -->
            <div v-for="service in selectedReservation.services_details" :key="service.id" class="bg-white shadow p-4">
              <div>Service Name: {{ service.service_name }}</div>
              <div v-if="service.quantity !== null">Quantity: {{ service.quantity }}</div>
                    <div v-if="service.remarks !== null">Remarks: {{ service.remarks }}</div>
                    <div>Total: {{ service.total_prices }}</div>
            </div>
          </div>
          <button @click="closeModal" class="modal-close-btn">Close</button>
        </div>
      </div>


    </div>
    <!-- Content End -->
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import { watch } from 'vue';

const events = ref([]);
const selectedReservation = ref(null);
const showModal = ref(false);
const calendarRenderKey = ref(0); // Key to force re-render of FullCalendar

const calendarOptions = ref({
  plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,listWeek',
  },
  eventClick: (info) => {
  const event = info.event;
  if (event.extendedProps) {
    selectedReservation.value = {
      reservation_details: {
        ...event.extendedProps.reservation_details
      },
      services_details: event.extendedProps.services_details || [] // Extract services_details
    };
    showModal.value = true; // Show the modal when an event is clicked
    console.log('Selected Reservation:', selectedReservation.value);
  }
},
  events: (fetchInfo, successCallback) => {
    successCallback(events.value);
  },


  eventContent: (arg) => {
    const div = document.createElement('div');
    div.textContent = arg.event.title;
    div.style.backgroundColor = arg.event.backgroundColor; // Set background color
    div.style.color = 'black'; // Set text color

    return { domNodes: [div] };
  },

});
const closeModal = () => {
  showModal.value = false;
};

onMounted(async () => {
  try {
    const response = await axios.get('/reservations');
    if (Array.isArray(response.data)) {
      const mappedEvents = response.data.map(reservation => {
        const start = `${reservation.reservation_details.eventDateFrom}T${reservation.reservation_details.startTime}`;
        const end = `${reservation.reservation_details.eventDateTo}T${reservation.reservation_details.endTime}`;

        let eventColor = '';
        switch (reservation.reservation_details.Status) {
          case 0:
            eventColor = 'lightblue';
            break;
          case 1:
            eventColor = 'yellow';
            break;
          case 2:
            eventColor = 'lightgreen';
            break;
          case 3:
            eventColor = 'pink';
            break;
          default:
            eventColor = 'lightblue';
        }

        return {
          title: reservation.reservation_details.event_name,
          start,
          end,
          reservation_details: {
            ...reservation.reservation_details,
          },
          services_details: reservation.services_details || [], // Extract services_details
          color: eventColor,
        };
      });

      events.value = mappedEvents; // Update events after processing the response
    } else {
      console.error('Invalid data format: Unable to process the response.');
    }
  } catch (error) {
    console.error('Error fetching reservations:', error);
  }
});

// Watch for changes in events and update the key to trigger re-render
watch(events, () => {
  calendarRenderKey.value += 1; // Increment key to force re-render
});

</script>

<style>

.router-link:hover {
color: white;
background-color: #0C4B05; 
} 

.active-link {
color: white;
background-color: #0C4B05; 
}


#calendar {
  width: 1100px;
  height: 550px;
  margin: 0 auto;
}

.custom-event {
  border: 1px solid #ccc;
  padding: 5px;
  background-color: #f3f3f3;
}

/* Modal styles */
/* Styles for the modal */
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  max-width: 80%;
  max-height: 80%;
  overflow-y: auto;
}

.modal-close-btn {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #ccc;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Additional styles for cleaner design */
.bg-white {
  background-color: white;
}

.rounded-lg {
  border-radius: 8px;
}

.shadow {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

</style>
