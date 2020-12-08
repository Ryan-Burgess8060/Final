import math
def square(request):
    #protocols and headers for handling CORS was taken from a Google Cloud tutorial that was shown in class https://cloud.google.com/functions/docs/writing/http#functions_http_cors-python
    if request.method == 'OPTIONS':
        headers = {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'GET',
            'Access-Control-Allow-Headers': 'Content-Type',
            'Access-Control-Max-Age': '3600'
        }

        return ('', 204, headers)
    headers = {
        'Access-Control-Allow-Origin': '*'
    }
    #request_json stuff was taken from professor Thackston.
    request_json = request.get_json()
    x1 = request_json.get("x1")
    y1 = request_json.get("y1")
    x2 = request_json.get("x2")
    y2 = request_json.get("y2")
    try:
        x1 = int(x1)
        y1 = int(y1)
        x2 = int(x2)
        y2 = int(y2)
    except:
        #The code to send a response code was taken from this stackoverflow forum: https://stackoverflow.com/questions/44353455/how-to-send-a-status-200-answering-to-a-https-post-in-python
        return ('bad request', 400, headers)
    #code from this site was used to calculate area of a square when given two corners: https://math.stackexchange.com/questions/506785/given-two-diagonally-opposite-points-on-a-square-how-to-calculate-the-other-two
    xc = (x1 + x2)/2
    yc = (y1 + y2)/2
    xd = (x1 - x2)/2
    yd = (y1 - y2)/2
    x3 = xc - yd
    y3 = yc + xd
    srd = ((x3-x1)**2)-((y3-y1)**2)
    asrd = abs(srd)
    #The code for using square root as well as idea to import math was taken from here: https://realpython.com/python-square-root-function/
    d = math.sqrt(asrd)
    answer = d * d
    answer = int(answer)
    answer = str(answer)
    #The code for properly returning the headers for CORS was also taken from the Google Cloud tutorial for handling CORS requests.
    return (answer, 200, headers)