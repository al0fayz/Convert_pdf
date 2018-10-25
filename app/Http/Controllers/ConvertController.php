<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function canvas1(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas1.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas2(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas2.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas3(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas3.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas4(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas4.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas5(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas5.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas6(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas6.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas7(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas7.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas8(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas8.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas9(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas9.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas10(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas10.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
	public function canvas11(Request $request, $id =null)
	{
		$data = $request->get('image');

		if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
			$imageType = $matches[1];
			$imageData = base64_decode($matches[2]);
			$image = imagecreatefromstring($imageData);
			$filename =  'canvas11.png';

			if (imagepng($image, public_path().'/images/' . $filename)) {
				echo json_encode(array('filename' => '/images/' . $filename));
			} else {
				throw new Exception('Could not save the file.');
			}
		} else {
			throw new Exception('Invalid data URL.');
		}
	}
}
