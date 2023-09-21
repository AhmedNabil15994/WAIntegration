# WAIntegration
simple laravel package to connect your whatsapp and send messages.


# Installation
composer require ahmednabil94/wa-integration


After updating composer, add the ServiceProvider to the providers array in config/app.php. <br />
 
WAIntegration\WAServiceProvider::class, <br />

Optionally you can use the Facade for shorter code. Add this to your facades: <br />

'Instance' => WAIntegration\Facades\InstanceFacade::class, <br />
'Message' => WAIntegration\Facades\MessageFacade::class, <br />

 more is coming soon. <br />

 Finally you can publish the config file: <br />
 php artisan vendor:publish --provider="WAIntegration\WAServiceProvider"  <br />

# Configuration
 The main change to this config file (config/wa_integration.php) will be filled with your channel credentials. <br />

 For example, when loaded with composer, the line should look like: <br />
 'id'            => env('WA_CHANNEL_ID','YOUR_CHANNEL_ID_HEER'), <br />

# Usage

 You can create a new (Message or Instance) instance and begin sending messages or fetching qr & account activity status. <br />

 # Use the facade:
 
 ## - Instance Facade

   // To fetch current qr  <br />
  - Instace::qr()
  // To Check If account status is active or disconnected <br />
  - Instance::status()
  // Disconnect Channel Connection <br />
  - Instance::disconnect()
  // Remove Channel becareful when trying to use it <br />
  - Instance::clearInstance()
  // Clear all files associated with channel <br />
  - Instance::clearInstanceData()

 ## - Message Facade
 
  - Message::send([
   'phone' => '965xxxxxxxx',
   'body'  => 'Your Message Body Here'
  ]) // Send Text Message Via Whatsapp
