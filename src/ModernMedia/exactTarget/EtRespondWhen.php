<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtRespondWhen extends EtBaseClass
{
    const Never                  = 'Never';
    const OnError                = 'OnError';
    const Always                 = 'Always';
    const OnConversationError    = 'OnConversationError';
    const OnConversationComplete = 'OnConversationComplete';
    const OnCallComplete         = 'OnCallComplete';
}

