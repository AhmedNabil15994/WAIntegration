# WAIntegration
simple laravel package to connect your whatsapp and send messages.


# Installation
## composer require ahmednabil94/wa-integration


After updating composer, add the ServiceProvider to the providers array in config/app.php

WAIntegration\WAServiceProvider::class,

Optionally you can use the Facade for shorter code. Add this to your facades:

'Instance' => WAIntegration\Facades\InstanceFacade::class,
'Message' => WAIntegration\Facades\MessageFacade::class,

more is coming soon.

Finally you can publish the config file:
php artisan vendor:publish --provider="WAIntegration\WAServiceProvider" 

#Configuration
The main change to this config file (config/wa_integration.php) will be filled with your channel credentials.

For example, when loaded with composer, the line should look like:
'id'            => env('WA_CHANNEL_ID','YOUR_CHANNEL_ID_HEER'),

#Usage

You can create a new (Message or Instance) instance and begin sending messages or fetching qr & account activity status.

 #Use the facade:
 
 Instance Facade
 
 Instace::qr()  // To fetch current qr
 Instance::status() // To Check If account status is active or disconnected
 Instance::disconnect() // Disconnect Channel Connection
 Instance::clearInstance() // Remove Channel becareful when trying to use it
 Instance::clearInstanceData() // Clear all files associated with channel

 Message Facade
 Message::send([
   'phone' => '965xxxxxxxx',
   'body'  => 'Your Message Body Here'
 ]) // Send Text Message Via Whatsapp
