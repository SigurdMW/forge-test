<?php 

namespace Custom\Responses;	

class ApiResponse {

	// Default statuscode
	protected $statusCode = 200;


	/*
	 *
	 * BASE FUNCTIONS
	 * 
	 */
	
	public function getStatusCode(){
		return $this->statusCode;
	}


	public function setStatusCode($statusCode){
		$this->statusCode = $statusCode;

		return $this;
	}


	public function sendResponse($statusCode, $message = "", $data, $headers = [])
	{
		$this->setStatusCode($statusCode);

		if (! $message){
			if($statusCode == 200){
				$message = "OK";	
			}

			if($statusCode == 400){
				$message = "Validation or similar failed.";
			}

			if($statusCode == 401){
				$message = "Not authorized.";	
			}			

			if($statusCode == 404){
				$message = "Resource not found.";
			}

			if($statusCode == 500){
				$message = "Internal server error.";
			}
			
		}

		return Response()->json([
				'status_code' 	=> $statusCode,
				'message' 		=> $message,
				'data'			=> $data
			], $statusCode, $headers);
	}

}