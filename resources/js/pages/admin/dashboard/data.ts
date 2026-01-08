import {
    Collection,
    DataAnalysis,
    Reading,
    School,
} from '@element-plus/icons-vue';

export const getMonth = () => {
    const data = [
        { id: 1, name: 'មករា', major: 15 },
        { id: 2, name: 'កុម្ភៈ', major: 15 },
        { id: 3, name: 'មីនា', major: 15 },
        { id: 4, name: 'មេសា', major: 15 },
        { id: 5, name: 'ឧសភា', major: 15 },
        { id: 6, name: 'មិថុនា', major: 15 },
        { id: 7, name: 'កក្កដា', major: 15 },
        { id: 8, name: 'សីហា', major: 15 },
        { id: 9, name: 'កញ្ញា', major: 15 },
        // { id: 10, name: "តុលា", major: 15 },
        // { id: 11, name: "វិច្ឆិកា", major: 15 },
        { id: 12, name: 'ធ្នូ', major: 15 },
        { id: 13, name: 'ឆមាសទី១', major: 12, color: 'red' },
        { id: 14, name: 'ឆមាសទី២', major: 12, color: 'red' },
    ];
    return data;
};

export const getDashboard = () => {
    const data = [
        {
            id: 1,
            label: 'សិស្សសរុប',
            value: 950,
            icon: Reading,
            color: '#2563eb',
            textColor: 'text-blue-600',
        },
        {
            id: 2,
            label: 'គ្រូបង្រៀន',
            value: 45,
            icon: Collection,
            color: '#16a34a',
            textColor: 'text-green-600',
        },
        {
            id: 3,
            label: 'ថ្នាក់សិក្សា',
            value: 20,
            icon: School,
            color: '#ea580c',
            textColor: 'text-orange-600',
        },
        {
            id: 4,
            label: 'មុខវិទ្យា',
            value: 30,
            icon: DataAnalysis,
            color: '#9333ea',
            textColor: 'text-purple-600',
        },
    ];
    return data;
};
