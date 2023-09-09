from django.shortcuts import render

from django.http import JsonResponse
from datetime import datetime, timedelta
import os

def get_info(request):
    slack_name = request.GET.get('slack_name')
    track = request.GET.get('track')
    
    if slack_name == 'Adeyermi' and track == 'Backend':
        current_day = datetime.now().strftime('%A')
        utc_time = datetime.utcnow().strftime('%Y-%m-%dT%H:%M:%SZ')

        # Get the GitHub URL of the current file and full source code
        current_file_url = f'https://github.com/your_username/your_repo/blob/main/{os.path.basename(__file__)}'
        source_code_url = 'https://github.com/your_username/your_repo'

        response_data = {
            'slack_name': slack_name,
            'current_day': current_day,
            'utc_time': utc_time,
            'track': track,
            'github_file_url': current_file_url,
            'github_repo_url': source_code_url,
            'status_code': 200,
        }

        return JsonResponse(response_data, status=200)

    return JsonResponse({'error': 'Invalid parameters'}, status=400)
