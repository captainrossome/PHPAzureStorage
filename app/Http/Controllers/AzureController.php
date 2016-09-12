<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Common\ServiceException;


class AzureController extends Controller
{
    //
	public $connectionString = "DefaultEndpointsProtocol=https;AccountName=hcahackathonstore;AccountKey=c4Rudlyl1ohVxM43UJgg8luSQ5Sp/Di3qef6uwX997X3tczzO6DBSgPH/Kjm0ZrP2WsxPhpKC7bAAKEkYMAJJQ==";

    public function index()
	{
		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);
		
		try {
		    // List blobs.
		    $blob_list = $blobRestProxy->listBlobs("mycontainer");
		    $blobs = $blob_list->getBlobs();

		}
		catch(ServiceException $e){
		    // Handle exception based on error codes and messages.
		    // Error codes and messages are here:
		    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		    $code = $e->getCode();
		    $error_message = $e->getMessage();
		    echo $code.": ".$error_message."<br />";
		}

		return view('azures.index', compact('blobs'));
	}

	public function upload(){
		return view('azures.upload');
	}

	public function createBlob(Request $request){
		$file = $request->blobFile;

		$uniqueFileName = $file->getClientOriginalName();
		$content = fopen($file, 'r');

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);

		try {
		    //Upload blob
		    $blobRestProxy->createBlockBlob("mycontainer", $uniqueFileName, $content);
		}
		catch(ServiceException $e){
		    // Handle exception based on error codes and messages.
		    // Error codes and messages are here:
		    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		    $code = $e->getCode();
		    $error_message = $e->getMessage();
		    echo $code.": ".$error_message."<br />";
		}
		return redirect()->route('azures.index')->with('message', 'Item uploaded successfully.');
	}

	public function delete(Request $request){

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);

		try {
		    // Delete blob.
		    $blobRestProxy->deleteBlob("mycontainer", $request->blobName);
		}
		catch(ServiceException $e){
		    // Handle exception based on error codes and messages.
		    // Error codes and messages are here:
		    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		    $code = $e->getCode();
		    $error_message = $e->getMessage();
		    echo $code.": ".$error_message."<br />";
		}
		return redirect()->route('azures.index')->with('message', 'Item deleted successfully.');
	}
}
