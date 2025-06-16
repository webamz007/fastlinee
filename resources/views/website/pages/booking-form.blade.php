@extends('website.layouts.app')
@section('title')
    Booking Ride
@endsection
@section('css')
    <style>
        /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);


        /*form styles*/
        #msform select {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform select:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #FDBF10;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*inputs*/
        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #FDBF10;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        #msform .error-field {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid red;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 200px;
            background: #FDBF10;
            font-weight: bold;
            color: #fff;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #FDBF10;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #000;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #000;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        .steps {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            position: relative;
            }
            .steps .circle {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            width: 50px;
            color: #999;
            font-size: 22px;
            font-weight: 500;
            border-radius: 50%;
            background: #fff;
            border: 3px solid #e0e0e0;
            transition: all 200ms ease;
            transition-delay: 0s;
            }
            .steps .circle.active {
            transition-delay: 100ms;
            border-color: #FDBF10;
            color: #FDBF10;
            }
            .steps .progress-bar {
            position: absolute;
            height: 3px;
            width: 100%;
            background: #e0e0e0;
            z-index: -1;
            }
            .progress-bar .indicator {
            position: absolute;
            height: 100%;
            width: 0%;
            background: #FDBF10;
            transition: all 300ms ease;
            }


        /* Car services Scrollbar */
        .car-services {
            max-height: 320px;
            overflow-y: auto;
            cursor: pointer;
        }

        .car-services::-webkit-scrollbar {
            width: 5px;
        }

        .car-services::-webkit-scrollbar-thumb {
            background-color: black;
            border-radius: 5px;
        }
        .car-item i.fa-check {
            display: none;
        }
        .car-item.selected i.fa-check {
            display: inline-block; /* Show the check icon when the item is selected */
        }
        .car-img {
            width: 100%;
            height: 105px;
        }
        .ms-form {
            animation: fade 250ms ease-in-out forwards;
        }
        .ms-form.active {
            animation: slide 250ms 125ms ease-in-out both;
        }
        .multi-step-form {
            overflow: hidden;
            position: relative;
        }

        .hide {
            display: none;
        }
        @keyframes slide {
            0% {
                transform: translateX(200%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fade {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(.75);
                opacity: 0;
            }
            100% {
                opacity: 0;
                transform: scale(0);
            }
        }
        @media (max-width: 768px) {
            .car-img {
                height: 180px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- MultiStep Form -->
    <form action="{{ route('insert-booking') }}" data-multi-step class="multi-step-form" id="msform">
        @csrf
        <div class="container my-5">
            <!-- progressbar -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="steps">
                        <span class="circle">1</span>
                        <span class="circle">2</span>
                        <span class="circle">3</span>
                        <div class="progress-bar">
                          <span class="indicator"></span>
                        </div>
                      </div>
                </div>
            </div>
            {{-- Service Class Step 1 --}}
            <div class="row justify-content-center ms-form" data-step>
                <input type="hidden" name="booking_type" id="booking_type" value="{{ $booking_type }}">
                <input type="hidden" name="booking_date" id="booking_date" value="{{ $formatedBookingDate }}">
                <input type="hidden" name="route_id" id="route_id" value="{{ $route_id }}">
                <input type="hidden" name="car_id" id="car_id">
                <div class="col-md-6">
                    <div class="bg-dark rounded p-4">
                        <h5 class="text-white">{{ $formatedBookingDate }}</h5>
                        <p class="text-white">{{ $location_from }} - {{ $location_to }}</p>
                    </div>
                    <h5 class="text-left pt-3">Select Passengers</h5>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="passengers" id="passengers">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10 +</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($booking_type == '2')
                    <h5 class="text-left pt-3">Select Hour</h5>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="hours" id="hours">
                                        @for ($i = 1; $i <= 24; $i++)
                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card mt-3">
                        <div class="card-body car-services" id="carServicesContainer"></div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row border-bottom">
                                <div class="col-md-12">
                                    <p>All classes include:</p>
                                    <ul>
                                        <li>Free cancellation up until 1 hour before pickup</li>
                                        <li>Free 15 minutes of wait time</li>
                                        <li>Meet & Greet</li>
                                        <li>Complimentary bottle of water</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <p>Please Note:</p>
                                    <div class="d-flex align-items-baseline mb-1">
                                        <i class="fa-solid fa-circle-exclamation me-3"></i>
                                        <p>Guest/luggage capacities must be abided by for safety reasons. If you are unsure,
                                            select a larger class as chauffeurs may turn down service when they are exceeded.
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <i class="fa-solid fa-circle-exclamation me-3"></i>
                                        <p>The vehicle images above are examples. You may get a different vehicle of similar
                                            quality.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="action-button mt-3" data-next>Continue</button>
                </div>
            </div>
            {{-- Pickup Info Step 2 --}}
            <div class="row justify-content-center ms-form" data-step>
                <div class="col-md-6">
                    <div class="bg-dark rounded p-4">
                        <h5 class="text-white">{{ $formatedBookingDate }}</h5>
                        <p class="text-white">{{ $location_from }} - {{ $location_to }}</p>
                    </div>
                    <h5 class="text-left pt-3">Select who you are booking for</h5>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="booking_for" id="booking_for">
                                        <option value="me">Book For Myself</option>
                                        <option value="other">Book For Someone Else</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row d-none additional_info">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="name" id="name" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="email" name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-left pt-3">Provide additional information</h5>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="chauffeur_notes" id="chauffeur_notes" cols="30" rows="10" placeholder="Notes For The Chauffeur"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="action-button-previous mt-3" data-previous>Previous</button>
                    <button type="button" class="action-button mt-3" data-next>Continue</button>
                </div>
            </div>
            {{-- Checkout Step 3 --}}
            <div class="row justify-content-center ms-form" data-step>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $formatedBookingDate }}</h5>
                            <h6 class="m-0"><i class="fa-solid fa-car pe-2"></i> {{ $location_from }}</h6>
                            @if ($booking_type == '1')
                            <span class="py-2 d-inline-block">To</span>
                            <h6 class="m-0"><i class="fa-solid fa-car pe-2"></i> {{ $location_to }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <p>Total price</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-end total-price"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="action-button-previous mt-3" data-previous>Previous</button>
                    <button type="submit" class="action-button mt-3">Book Now</button>
                </div>
            </div>
        </div>
    </form>
    <!-- /.MultiStep Form -->
@endsection

@section('js')
    <script>
        // Here is Form Functionality

        const multiStepForm = document.querySelector("[data-multi-step]")
        const formSteps = [...multiStepForm.querySelectorAll("[data-step]")]
        let currentStep = formSteps.findIndex(step => {
            return step.classList.contains("active")
        })

        if (currentStep < 0) {
            currentStep = 0
            showCurrentStep()
        }

        multiStepForm.addEventListener("click", e => {
            let incrementor
            if (e.target.matches("[data-next]")) {
                incrementor = 1
            } else if (e.target.matches("[data-previous]")) {
                incrementor = -1
            }

            if (incrementor == null) return

            // Validation for the step 1
            const carIdInput = formSteps[currentStep].querySelector("[name='car_id']");
            if (currentStep === 0 && (!carIdInput || !carIdInput.value)) {
                // Display an error or take appropriate action
                alert("Please select a car before proceeding.");
                return;
            }

            // Validation for the step 2
            if (currentStep === 1 && document.getElementById('booking_for').value === 'other') {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();

                // Validate name, email, and phone
                if (name === '') {
                    handleError('name', 'show')
                    return;
                } else {
                    handleError('name', 'hide')
                }

                if (email === '') {
                    handleError('email', 'show')
                    return;
                } else {
                    handleError('email', 'hide')
                }

                if (phone === '') {
                    handleError('phone', 'show')
                    return;
                } else {
                    handleError('phone', 'hide');
                }
            }

            const inputs = [...formSteps[currentStep].querySelectorAll("input")]
            const allValid = inputs.every(input => input.reportValidity())
            if (allValid) {
                currentStep += incrementor
                showCurrentStep()
                // Scroll back to the top of the page
                document.documentElement.scrollTop = 0;
            }
        })

        formSteps.forEach(step => {
            step.addEventListener("animationend", e => {
                formSteps[currentStep].classList.remove("hide")
                e.target.classList.toggle("hide", !e.target.classList.contains("active"))
            })
        })

        function showCurrentStep() {
            formSteps.forEach((step, index) => {
                step.classList.toggle("active", index === currentStep)

            // Update the progress bar circles
            const circles = document.querySelectorAll(".circle");
            circles.forEach((circle, circleIndex) => {
                circle.classList.toggle("active", circleIndex <= currentStep);
            });

            // Update the progress indicator width
            const progressBar = document.querySelector(".indicator");
            progressBar.style.width = `${(currentStep / (circles.length - 1)) * 100}%`;

            })
        }

        // Handle form error
        function handleError(fieldName, errorType) {
            const fieldElement = document.getElementById(fieldName);
            if (errorType == 'show') {
                fieldElement.classList.add('error-field');
            } else {
                fieldElement.classList.remove('error-field');
            }
        }

        // Function to fetch and display car details
        function fetchCarDetails(routeId, passengers) {
            const carServicesContainer = document.getElementById('carServicesContainer');

            // Make an Ajax request using fetch
            fetch(`/service-cars?routeId=${routeId}&passengers=${passengers}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Clear existing content
                carServicesContainer.innerHTML = '';

                if (data.length === 0) {
                    // Display a message when no cars are found
                    const noCarMessage = document.createElement('div');
                    noCarMessage.classList.add('fw-bold');
                    noCarMessage.textContent = 'No cars found for the selected criteria.';
                    carServicesContainer.appendChild(noCarMessage);
                }
                else {
                    // Loop through the data and create HTML elements for each car
                    data.forEach((car, index) => {
                        const carItem = document.createElement('div');
                        carItem.classList.add('row', 'car-item');
                        carItem.setAttribute('data-car-id', car.id);
                        carItem.setAttribute('data-service-price', car.service_price);

                        if (index < data.length - 1) {
                            carItem.classList.add('border-bottom', 'mb-3', 'pb-3');
                        }

                        carItem.innerHTML = `
                            <div class="col-md-4">
                                <img src="${car.car_image}" alt="Car Image" class="img-responsive img-fluid img-thumbnail car-img">
                            </div>
                            <div class="col-md-8">
                                <h6 class="d-flex justify-content-between mt-3 mt-md-0"><span>${car.category_name} - ${car.car_name}</span> <i class="fa-solid fa-check"></i></h6>
                                <span class="me-3"><i class="fa-solid fa-user-group"></i> max. ${car.passengers}</span>
                                <span><i class="fa-solid fa-briefcase"></i> max. ${car.weight}</span>
                                <h4 class="pt-2 mb-0">${car.service_price} SAR</h4>
                            </div>
                        `;
                        carServicesContainer.appendChild(carItem);
                    });
                }
            })
            .catch(error => console.error('Error fetching car details:', error));
        }

        fetchCarDetails( document.getElementById('route_id').value, document.getElementById('passengers').value);

    // Add an event listener to the "passengers" input field
    const passengersInput = document.getElementById('passengers');

    passengersInput.addEventListener('change', function() {
        const routeId = document.getElementById('route_id').value;
        const newPassengersValue = passengersInput.value;
        fetchCarDetails(routeId, newPassengersValue);
    });

    // Add click event listener to the car services container
    document.getElementById('carServicesContainer').addEventListener('click', function (event) {
        const carItem = event.target.closest('.car-item');

        if (carItem) {
            const selectedCarIdField = document.getElementById('car_id');
            selectedCarIdField.value = carItem.dataset.carId;

            const selectedServicePrice = carItem.dataset.servicePrice;
            const bookingType = document.getElementById('booking_type').value;
            const totalPriceElement = document.querySelector('.total-price');

            if (bookingType == 1) {
                totalPriceElement.textContent = parseFloat(selectedServicePrice).toFixed(2) + ' SR';
            } else {
                const bookingHours = document.getElementById('hours').value;
                const totalAmount = parseFloat(selectedServicePrice) * parseFloat(bookingHours);
                totalPriceElement.textContent = totalAmount.toFixed(2) + ' SR';
            }

            document.querySelectorAll('.car-item').forEach(item => {
                item.classList.remove('selected');
            });

            carItem.classList.add('selected');
        }
    });

    // Add change event listener to the hours to update cart price
    const hoursElement = document.getElementById('hours');
    if (hoursElement) {
        hoursElement.addEventListener('change', function (event) {
            const selectedCarItem = document.querySelector('.car-item.selected');
            const selectedServicePrice = selectedCarItem ? selectedCarItem.dataset.servicePrice : null;
            const totalPriceElement = document.querySelector('.total-price');

            if (selectedServicePrice !== null) {
                const totalAmount = parseFloat(selectedServicePrice) * parseFloat(this.value);
                totalPriceElement.textContent = totalAmount.toFixed(2) + ' SR';
            } else {
                // Handle the case when selectedCarItem is null
                console.error('No selected car item.');
            }
        });
    }

    // Function to toggle the visibility of additional_info based on the selected value
    document.getElementById('booking_for').addEventListener('change', function(){
        const additionalInfoField = document.querySelector('.additional_info');

        if (this.value === 'me') {
            additionalInfoField.classList.add('d-none');
        } else {
            additionalInfoField.classList.remove('d-none');
        }
    });






    </script>
@endsection
